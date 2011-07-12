<?php

  function add_seed($data) {
    foreach ($data as &$d) {
      $d = mysql_real_escape_string($d);
    }
    
    extract($data);
    
    $tags = fix_tags($tags);
    add_tags($tags);
    
    $sql = "INSERT IGNORE INTO seeds (url, title, description, frequency, scope, category, language, name, email, tags, location, lat, lng, verified) VALUES ('$url', '$title', '$description', '$frequency', '$scope', '$category', '$language', '$name', '$email', '$tags', '$location', '$lat', '$lng', '$verified')";    
    $result = mysql_query($sql);
    
    if (!$result) return;
    
    $sid = mysql_insert_id();
    add_tags_relations($tags, $sid);
    return;
  }

  function edit_seed($data) {
    foreach ($data as &$d) {
      $d = mysql_real_escape_string($d);
    }
    
    extract($data);
    
    $tags = fix_tags($tags);
    add_tags($tags);
    
    $sql = "UPDATE seeds SET url = '$url', title = '$title', description = '$description', frequency = '$frequency', scope = '$scope', category = '$category', language = '$language', name = '$name', email = '$email', tags = '$tags', location = '$location', lat = '$lat', lng = '$lng', verified = '$verified' WHERE sid = $sid";
    $result = mysql_query($sql);
    
    if (!$result) return;
    
    add_tags_relations($tags, $sid);
    return;
  }

  function get_seed($sid) {
    $sid = mysql_real_escape_string($sid);
    $sql = "SELECT * FROM seeds WHERE sid = $sid";
    $seeds = array();
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $o->tags = explode(',', get_tags($sid));
      $seeds[] = $o;
    }
    return count($seeds) ? $seeds[0] : null;
  }
  
  function get_seed_number($conditions = array()) {
    $sql = "SELECT COUNT(*) FROM seeds";
    if ($conditions) {
      $sql .= " WHERE";
      foreach ($conditions as $field => $c) {
        $c = mysql_real_escape_string($c);
        if ($field == 'verified') {
          switch($c) {
            case 'rejected':
              $c = 2;
              break;
            case 'verified':
              $c = 1;
              break;
            default:
              $c = 0;
          }
        }
        if ($field == 'name' && $c == 'Anonymous') {
          $c = '';
        }
        if ($field != 'tags') {
          $sql .= " $field = '$c' AND";
        } else {
          $sids = get_sids_by_tag($c);
          if (!$sids) {
            $sql .= " 0 = 1 AND";
          } else {
            $sids = implode(',', $sids);
            $sql .= " sid IN ($sids) AND";
          }
        }
      }
      $sql .= " 1=1";
    }
    $number = 0;
    $result = mysql_query($sql);
    if (mysql_num_rows($result) == 1) {
      $row = mysql_fetch_row($result);
      $number = $row[0];
    }
    
    return $number;
  }
  
  function get_seed_numbers() {
    $array = array();
    $sql = "SELECT COUNT(sid) FROM `seeds` WHERE verified = 1";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)) {
      $row = mysql_fetch_row($result);
      $array['verified'] = $row[0];
    } else {
      $array['verified'] = 0;
    }
    $sql = "SELECT COUNT(sid) FROM `seeds` WHERE verified = 2";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)) {
      $row = mysql_fetch_row($result);
      $array['rejected'] = $row[0];
    } else {
      $array['rejected'] = 0;
    }
    $sql = "SELECT COUNT(sid) FROM `seeds` WHERE verified = 0";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)) {
      $row = mysql_fetch_row($result);
      $array['notyet'] = $row[0];
    } else {
      $array['notyet'] = 0;
    }
    
    $array['all'] = $array['verified'] + $array['rejected'] + $array['notyet'];
    
    return $array;
    
  }
  
  function get_seeds($conditions = array(), $limit = 0) {
    $sql = "SELECT * FROM seeds";
    if ($conditions) {
      $sql .= " WHERE";
      foreach ($conditions as $field => $c) {
        $c = mysql_real_escape_string($c);
        
        if ($field == 'start') {
          $sql .= " sid >= $c AND";
        } else if ($field == 'end') {
          $sql .= " sid <= $c AND";
        } else if ($field == 'tags') {
          $sids = get_sids_by_tag($c);
          if (!$sids) {
            $sql .= " 0 = 1 AND";
          } else {
            $sids = implode(',', $sids);
            $sql .= " sid IN ($sids) AND";
          }
        } else {
          $sql .= " $field = '$c' AND";
        }
      }
      $sql .= " 1=1";
    }
    
    if ($limit > 0) {
      $limit = mysql_real_escape_string($limit);
      $sql .= " ORDER BY added DESC LIMIT $limit";
    } else {
      $sql .= " ORDER BY sid DESC";
    }
    
    $seeds = array();
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $o->tags = get_tags($o->sid);
      $seeds[] = $o;
    }
    
    return $seeds;
  }
  
  function get_seeds_paginated($conditions, $page, $perpage = 30) {
    $sql = "SELECT * FROM seeds";
    if ($conditions) {
      $sql .= " WHERE";
      foreach ($conditions as $field => $c) {
        $c = mysql_real_escape_string($c);
        if ($field == 'verified') {
          switch($c) {
            case 'rejected':
              $c = 2;
              break;
            case 'verified':
              $c = 1;
              break;
            default:
              $c = 0;
          }
        }
        if ($field == 'name' && $c == 'Anonymous') {
          $c = '';
        }
        if ($field != 'tags') {
          $sql .= " $field = '$c' AND";
        } else {
          $sids = get_sids_by_tag($c);
          if (!$sids) {
            $sql .= " 0 = 1 AND";
          } else {
            $sids = implode(',', $sids);
            $sql .= " sid IN ($sids) AND";
          }
        }
      }
      $sql .= " 1=1";
    }

    $page = mysql_real_escape_string($page);
    $start = $perpage * ($page - 1);
    $sql .= " ORDER BY sid DESC LIMIT $start, $perpage";
    $seeds = array();
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $o->tags = get_tags($o->sid);
      $seeds[] = $o;
    }
    
    return $seeds;
  }
  
  function get_seeds_search($q, $page, $language = '', $perpage = 30) {
    $q = mysql_real_escape_string($q);
    $page = mysql_real_escape_string($page);

    $start = $perpage * ($page - 1);
    
    $sql = "SELECT * FROM seeds WHERE verified = 1 AND " . search_query($q, $language);
    $sql .= " ORDER BY sid DESC LIMIT $start, $perpage";
    
    $seeds = array();
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $o->tags = get_tags($o->sid);
      $seeds[] = $o;
    }
    
    return $seeds;
  }

  function get_seeds_search_count($q, $language = '') {
    $q = mysql_real_escape_string($q);

    $sql = "SELECT COUNT(sid) FROM seeds WHERE verified = 1 AND " . search_query($q, $language);

    $number = 0;
    $result = mysql_query($sql);
    if (mysql_num_rows($result) == 1) {
      $row = mysql_fetch_row($result);
      $number = $row[0];
    }
    
    return $number;
  }

  function get_submitters() {
    $people = array();
    $sql = "SELECT name, COUNT(*) AS number FROM seeds GROUP BY name ORDER BY number DESC LIMIT 8";
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $people[] = $o;
    }
    
    return $people;
  }

  // TODO: Unclear why East Asian Language check works...
  function is_east_asian($string) {
    return !preg_match("/^[\x2E80-\x9FFF]/i", $string);
  }
  

  function last_exported_seed() {
    $array = array();
    $array['timestamp'] = '';
    $array['sid'] = '';
    $sql = "SELECT value, timestamp FROM global WHERE name = 'last_export_start'";
    $result = mysql_query($sql);
    
    if (mysql_num_rows($result) == 1) {
      $row = mysql_fetch_row($result);
      $array['timestamp'] = $row[1];
      $array['sid'] = $row[0];
    }
    
    return $array;
  }
  

  function search_query($q, $language) {
    $sql = "";
    $language = mysql_real_escape_string($language);

    if ($language) {
      $sql .= " language = '$language' AND";
    }
      
    if (is_east_asian($q)) {
      $sql .= " (title LIKE '%$q%' OR description LIKE '%$q%' OR tags LIKE '%$q%')";
    } else {
      $qs = str_replace(" ", " +", $q);
      $qs = "+" . $qs;
      $sql .= " (MATCH (title, description, tags) AGAINST ('$qs' IN BOOLEAN MODE))";
    }
    

  
    return $sql;
  }

?>