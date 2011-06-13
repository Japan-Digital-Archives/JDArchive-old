      <div id="sidebar">
        <ul>
          <li>
            <h2 data-zh="关于本项目" data-jp="この企画について" data-ko="이 프로젝트에 대하여">About this project</h2>
            
            <?php $language = language(); ?>
            
            <?php if ($language == 'ja'): ?>
            <p>震災・震災後に関するオンライン資料やウェブサイトをデジタル・アーカイブに収録するために、皆様のご協力をお願いしております。に関する詳しい情報は（<a href="/?la=ja">こちら</a>）。</p>
            
		<?php elseif ($language == 'zh'): ?>
		<p>请帮助我们设立一个关于日本大地震与其余波的数码档案。我们在收集关联的网上网页以及社会媒体。请按这个链接，对本项目间加深了解：</p>
		
            <?php elseif ($language == 'ko'): ?>
            
            <p>저희가 이번 일본 재해와 그 파장에 관련된 인터넷 웹사이트와 관련 자료들을 정리하여 디지털 아카이브를 만들어 가는데 있어서 여러분들의 도움이 필요합니다.  저희 프로젝트에 대하여 더 알고 싶으실 경우 <여기>를 눌러주십시요.</p>
            
            <?php else: ?>
            
            <p>Please help us in our effort to develop a digital archive of online websites and resources related to the earthquake and its aftermath in Japan. Learn more about our project <a href="/">here</a>.</p>
            
            <?php endif ?>
            
          </li>
          
          <li>
            <h2 data-zh="数码书签" data-jp="ブックマーク" data-ko="북마클렛">Bookmarklet</h2>
            
            <?php if ($language == 'ja'): ?>
            
            <p>もしFirefox, Safari, Chrome, Operaなどのブラウザーを使用されているならば、以下のボックスをブックマーク・ツールバーにまでドラッグして下さい。利用できそうなウェブサイトを次回見つけた場合、そのブックマークをクリックして頂ければ、私達が自動的にそのサイトの情報を入力します。<a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?la=ja&url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JEDArchive link</a></p>
            
            <?php elseif ($language == 'ko'): ?>
            
            <p>파이어 폭스, 사파리, 구글 크롬, 혹은 오페라를 쓰시는 사용자분들께서는 <a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?la=ko&url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JEDArchive</a> 링크를 북마크 툴바까지 끌어가 주시길 바랍니다. 혹시나 이번 아카이브에 관련있는 웹페이지를 방문하시게 되었을 경우, 북마크를 눌러주시면 저희가 제출서의 일부분을 자동작성하게 됩니다.</p>

		<?php elseif ($language == 'zh'): ?>
		
		<p>若您利用Firefox、Safari、Chrome或Opera，您可以把这个<a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?la=zh&url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JEDArchive</a>拉到您的网上书签工具栏上，以更方便资料提供。找到相关资料的话，请按这个网上书签，让我们为您自动填入一些控件。</p>
            
            <?php else: ?>
            
            <p>
            Drag the following
            <a class="bookmarklet" href="javascript:q=location.href;if(document.getSelection){d=document.getSelection();}else{d='';};p=document.title;void(open('http://jedarchive.org/bookmarklet?url='+encodeURIComponent(q)+'&description='+encodeURIComponent(d)+'&title='+encodeURIComponent(p),'Pinboard',%20'toolbar=no,width=660,height=450'));">JEDArchive link</a> to your bookmarks toolbar if you're using Firefox, Safari, Chrome or Opera.  Next time you're on a website you think is useful, just click the bookmark and we'll auto-fill some of the fields.
            
            </p>
            
            <?php endif ?>
            
          </li>

        </ul>
      </div>
      <!-- end #sidebar -->