      <div id="sidebar">
        <ul>
          <li>
            <h2>Menu</h2>
            
            <?php $language = language(); ?>
            
            <?php if ($language == 'ja'): ?>
            
             <ul>
            <li><a href="#websites"><strong>ウェブサイト<strong></a></li>
            <li><a href="#testimonials"><strong>わたしの「東日本大震災」<strong></a></li>
            <li><a href="#photos"><strong>写真と動画<strong></a></li>
            <li><a href="#audio"><strong>音声情報<strong></a></li>
            <li><a href="#maps"><strong>地図及び地理情報<strong></a></li>
            <li><a href="#social"><strong>ソーシャルメディア<strong></a></li>
            <li><a href="#text"><strong>他のテキスト情報<strong></a></li>
            <li><a href="#articles"><strong>記事データベース<strong></a></li>
            </ul>

            
            <?php elseif ($language == 'zh'): ?>
            
            <ul>
            <li><a href="#websites"><strong>网页<strong></a></li>
            <li><a href="#testimonials"><strong>个人证言<strong></a></li>
            <li><a href="#photos"><strong>照片与录影<strong></a></li>
            <li><a href="#audio"><strong>音响录音<strong></a></li>
            <li><a href="#maps"><strong>地图与地理数据<strong></a></li>
            <li><a href="#social"><strong>社会媒体<strong></a></li>
            <li><a href="#text"><strong>其他文体资料<strong></a></li>
            <li><a href="#articles"><strong>资料数据库<strong></a></li>
            </ul>
            
            
            <?php else: ?>
            
            <ul>
            <li><a href="#websites"><strong>Websites<strong></a></li>
            <li><a href="#testimonials"><strong>Personal Testimonials<strong></a></li>
            <li><a href="#photos"><strong>Photographs and Videos<strong></a></li>
            <li><a href="#audio"><strong>Audio<strong></a></li>
            <li><a href="#maps"><strong>Maps and Geographic Data<strong></a></li>
            <li><a href="#social"><strong>Social Media<strong></a></li>
            <li><a href="#text"><strong>Other Textual Sources<strong></a></li>
            <li><a href="#articles"><strong>Article Databases<strong></a></li>
            </ul>
                 
            <?php endif ?>
            
          </li>
        </ul>
      </div>
      <!-- end #sidebar -->

<?php /*
      <div id="sidebar">
        <ul>
          <li>
            <h2>Additional Links</h2>
            <ul>
              <li><a href="http://cegrp.cga.harvard.edu/japan/">Japan Sendai Earthquake Data Portal</a></li>
              <li><a href="http://archive-it.org/public/collection.html?id=2438">Japan Earthquake 2011</a>, a collection at the Internet Archive.</li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- end #sidebar --> */
?>