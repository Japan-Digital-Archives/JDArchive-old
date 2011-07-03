<?php

require_once(dirname(__FILE__). '/inc/common.php');

$language = language();

start();

?>



<div>
<?php language_bar($language, array('en', 'ja')); ?>
<div><h2 data-jp="Partners">Partners</h2></div>
</div>

<?php if ($language == 'ja'): ?>

...

<?php else: ?>

<p>This digital archive is only possible with the help of our partners. The Internet Archive has been harvesting the websites for the archive, ensuring their long term preservation. The National Diet Library and Library of Congress are offering their expertise and support in the gathering of relevant content for the archive. The metaLAB (at) Harvard is our key design and development partner, working in the coming year to create the archive platform that will produce a rich and robust interface to search, browse and share materials in the archive. Also integral to the design of our archive is the Center for Geographic Analysis, which has been a leader in the collection of rich datasets of geographic data about the disasters in Japan.</p>

<h3><strong>The Internet Archive</strong></h3>
<br />
<p>
<a href="http://www.archive.org/"><img style="padding-left: 5px; padding-right: 10px;" alt="The Internet Archive Logo" src="/lib/images/ia-logo.jpg"></a>
<a href="http://www.archive-it.org/"><img style="padding-left: 5px;" alt="Archive-it Logo" src="/lib/images/archive-it-logo.gif"></a>
</p>
<br />
<p style="line-height: 170%;">The Internet Archive, is a digital library founded in 1996 with the mission of universal access to human knowledge.  Like a paper library, we provide free access to researchers, historians, scholars, and the general public.  The web content that is part of the Digital Archive of Japan's 2011 Disasters is captured and archived using Archive-It, a web archiving service from the Internet Archive. Archive-It allows institutions around the world to harvest and preserve collections of web content and create digital archives. </p>
<h3><strong>The National Diet Library</strong></h3>
<br />
<h3><strong>The Library of Congress</strong></h3>
<br />
<h3><strong>metaLAB (at) Harvard</strong></h3>
<br />
<p>
<a href="http://metalab.harvard.edu/"><img style="padding-left: 5px;" alt="metaLAB (at) Harvard" src="/lib/images/metalab-logo.png"></a>
</p>
<br />

<p style="line-height: 170%;">metaLAB (at) Harvard is a hub for innovation in the arts, media and humanities hosted at the Berkman Center for Internet and Society. The lab is founded on the belief that some of the key research challenges and opportunities of the new millennium, not to mention crucial questions about experience in a connected world, about the boundaries of culture and nature, about democracy and social justice, transcend divisions between the arts, sciences, and humanities; between the academy, industry, and the public sphere; between theoretical and applied knowledge.</p>
<br />
<h3><strong>Center for Geographic Analysis</strong></h3>


<?php endif ?>

<?php

stop(0);
