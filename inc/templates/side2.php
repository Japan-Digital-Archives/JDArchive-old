      <div id="sidebar">
        <ul>
          <li>
            <h2 data-jp="進捗状況" data-ko="현재 상황">Current Status</h2>
            
            <?php $language = language(); ?>
            
            <?php if ($language == 'ja'): ?>
            
            <p class="status">
           
<strong>5/23/2011</strong> 皆様からお寄せ頂いた情報の一部を<a href="/seeds/">こちら</a>からご覧いただけるようになりました。なおこれらは現在、アーカイブ化の過程にございます。これまでのご協力に感謝申し上げます。さらに多くの情報をアーカイブできますよう、皆様のご支援をお願い申し上げます。</p>
<p class="status">
 <strong>5/3/2011</strong>　当企画は、現在資料の収集を始め、アーカイブ内の様々な部分を繋ぎ合わせる、利用者との互換検索システムを設計しています。当企画がアーカイブの資料を公開できるようになるまでには、しばらく時間がかかると思われます。皆様のご理解に感謝いたします。それまでの間、アーカイブの一端を示すウェブサイトが、<a href="http://archive-it.org/public/collection.html?id=2438">「東日本大震災2011」</a>で公開されていますのでご覧下さい。
            </p>
            
            <?php elseif ($language == 'zh'): ?>
            
            <p class="status">
            <strong>5/3/2011</strong>此项目正在征求资料，设计一个能连接档案各部分的有效的用户界面。因此我们需要一些时间公开档案的资料，谢谢见谅。在此期间，您能通过网络档案 (Internet Archive) 的"<a href="http://archive-it.org/public/collection.html?id=2438">日本地震2011项目</a>"浏览本站档案收录的一部分的网站。
            </p>
            
            <?php elseif ($language == 'ko'): ?>
            
            <p class="status">
            <strong>2011년 5월 3일: </strong>지금 디지털 아카이브 프로젝트는 관련 자료들을 구하고 있으며 아카이브의 여러 부분을 통합적으로 검색할 수 있는 사용자 검색 인터페이스를 구축 중 입니다. 아카이브 공개까지는 아직도 약간의 시간이 더 필요할 것 같으며, 이용자 여러분들의 이해에 감사드립니다. 완전공개에 앞서 저희 아카이브의 일부분이 인터넷 기록저장소의 2011년 일본 지진 프로젝트로 공개되어 있습니다.
            </p>
            
            <?php else: ?>
            
            <p class="status"><strong>5/23/2011</strong> We have made available a selection of seeds that have been submitted to us <a href="/seeds/">here</a>.  These are in the process of being archived.</p>
            
            <p class="status"><strong>5/3/2011</strong> The project is currently soliciting material and designing a robust user search interface that bridges the various components of the archive. It will take some time before the project will be able to make the archive materials available. We thank you for your understanding. In the meantime, some of the websites that represent one component of the archive are available through the Internet Archive's <a href="http://archive-it.org/public/collection.html?id=2438">Japan Earthquake 2011</a> project.</p>
            
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