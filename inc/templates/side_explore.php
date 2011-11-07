	 <?php $language = language(); ?>

	<?php if ($language == 'ja'): ?>
      <div id="sidebar">
        <h2 >ここまでのアーカイブ</h2></h2>
        <ul>
          <li>

            <h2><a href="../seeds/">ウェブ・アーカイブを検索する</a></h2>
                <p>当アーアイブに収蔵されたウェブサイトやそれらについての情報、例えばページのタイトルや説明、関連するタグなどを検索することができます。</p>
          </li>
          <li>
              <h2><a href="../contribute/">ウェブサイトの投稿</a></h2>
              <p>アーカイブに適うと皆様が考える震災関連のウェブサイトは収蔵されていましたか？もしそうでなければ、投稿用のページかまたはJDArchiveのブックマークをお使いになり投稿にご協力下さい。</p>
          </li>
          <li>
              <h2><a href="../featured/">わたしの「東日本大震災」</a></h2>
              <p>これまでに皆様から寄せられた「わたしの『東日本大震災』」から、いつくかの投稿をご紹介しております。「わたしの『東日本大震災』」ページを直接ご利用になることで皆様の<a href="../testimonial/">体験を共有しませんか。</a></p>
          </li>
          <li>
              <h2><a href="http://worldmap.harvard.edu/japanmap/">地理空間情報レイヤー</a></h2>
              <p>地理学分析センターと恊働することで、私たちがご提供する地理空間情報レイヤーは深化し続けています。このレイヤー情報により、同センターが制作したJapan Sendai Earthquake Data Portalと共有している豊富なデータをどなたでもご覧頂くことができます。</p>
          </li>
        </ul>
      </div>
      <!-- end #sidebar -->
      <?php else: ?>
      <div id="sidebar">
        <h2>Accessible Now</h2></h2>
        <ul>
          <li>

            <h2><a href="../seeds/?la=en">Search the Web Archive</a></h2>
                <p>Search the collection of harvested websites and website information.</p>
          </li>
          <li>
              <h2><a href="../contribute/?la=en">Contribute</a></h2>
              <p>Submit websites related to the disasters through our <a href="../contribute/">form</a> or by using our bookmarklet. Next time you're on a website you think is useful, just click the bookmark and we'll auto-fill some of the fields.</p>
          </li>
          <li>
              <h2><a href="../featured/?la=en">Featured Testimonials</a></h2>
              <p>Visit our featured testimonial page to read some of the contributions to the testimonial collection or submit your own story through our 
              <a href="../testimonial/">form</a>.</p>
          </li>
          <li>
              <h2><a href="http://worldmap.harvard.edu/japanmap/?la=en">Browse our Map Layers</a></h2>
              <p>Explore rich map layers that can allow anyone to browse some of the many rich data sets that have been shared with the Japan Sendai Earthquake Data Portal.</p>
          </li>
        </ul>
      </div>
      <!-- end #sidebar -->
       <?php endif ?>