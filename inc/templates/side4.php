      <div id="sidebar">
        <ul>
         <?php $language = language(); ?>
            
          <?php if ($language == 'ja'): ?>
          <li>
          
            <h2>登録済みの有無確認</h2>
            <p>始めに、あなたが推薦・登録したいと思うウェブサイトのURL (seed) が、すでに他の方によって登録され、収録作業が開始されているかどうかを、まず確認してください。無用の重複を避けるためです。</p>
            <ul>
            	<li>重複チェックの検索エンジン（http://jdarchive.org/seeds）を開く。</li>
            	<li>“Search seeds” の検索欄に登録したいウェブサイトのURLを入力する。</li>
            </ul>
            <p>マッチする seeds が存在しないことが分かったら、次のステップに沿ってあなたが推薦・登録したいと思うウェブサイトのURLを投稿なさってください。</p>
          </li>

			<?php endif ?>
        </ul>
      </div>
      <!-- end #sidebar -->