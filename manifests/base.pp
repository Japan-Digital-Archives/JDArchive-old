class mysql-server {
  $mysql_root_pwd = "jdarchive"

  define mysqldb( $user, $password ) {
    exec {
      "create-${name}-db":
        unless => "mysql -u${user} -p${password} ${name}",
        command => "mysql -uroot -p$mysql_root_pwd -e \"create database ${name}; grant all on ${name}.* to ${user}@localhost identified by '$password';\"",
        require => Service["mysql"],
        path => "/bin:/usr/bin",
    }
  }
  
  package { "mysql-server": ensure => installed }

  service { "mysql":
    ensure          => running,
    enable          => true,
    hasrestart      => true,
    hasstatus       => true,
    require => Package["mysql-server"],
  }

  exec { "Set MySQL server root password":
    subscribe => [ Package["mysql-server"], ],
    refreshonly => true,
    unless => "mysqladmin -uroot -p$mysql_root_pwd status",
    path => "/bin:/usr/bin",
    command => "mysqladmin -uroot password $mysql_root_pwd",
  }

  mysqldb { 'jedarchi_seeds': user => 'jedarchi', password => 'jedarchi', }
  
}

class apache {
  $apache2_sites = "/etc/apache2/sites"
  $apache2_mods = "/etc/apache2/mods"
   
  package { "apache2":
    ensure => present,
  }

  service { "apache2":
    ensure => running,
    enable          => true,
    hasrestart      => true,
    hasstatus       => true,
    require => Package["apache2"],
  }

  file { "/etc/apache2/sites-available/jdarchive":
    content => "<VirtualHost *:80>
   DocumentRoot \"/vagrant\"
   ServerName jdarchive.local

   <Directory />
       Options FollowSymlinks
       AllowOverride All
   </Directory>
   <Directory \"/vagrant\">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

</VirtualHost>
"
  }

  exec { "/usr/sbin/a2ensite jdarchive":
    unless => "/bin/readlink -e ${apache2_sites}-enabled/jdarchive",
    notify => Exec["reload-apache2"],
    require => Package["apache2"],
  }

  exec { "/usr/sbin/a2enmod rewrite":
    unless => "/bin/readlink -e ${apache2_mods}-enabled/rewrite.load",
    notify => Exec["reload-apache2"],
    require => Package["apache2"],
  }

  exec { "reload-apache2":
    command => "/etc/init.d/apache2 reload",
    refreshonly => true,
    subscribe => File["/etc/apache2/sites-available/jdarchive"],
  } 
}

class php5 {
  package {
    ["php5",
     "php5-cli",
#     "php5-xcache",
     "libapache2-mod-php5",
#     "phpunit",
     "php5-mysql",
     "php5-xdebug",
     "php5-curl",
#     "php5-memcache",
     "php5-gd",
#     "php-pear",
#     "php-apc",
     ]: ensure => installed
  }
}

include mysql-server
include apache
include php5

file { "/etc/php5/apache2/conf.d/my.ini":
  content => "[PHP]
  display_errors = On
  post_max_size = 8M
  upload_max_filesize = 8M",
  notify => Exec["reload-apache2"],
}
