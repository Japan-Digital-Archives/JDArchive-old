<h2><?= $this->t('title') ?></h2>
<p id="directions"><?= $this->t('directions') ?></p>
<p id="required"><span class="red">*</span><span><?= $this->t('required_field') ?></span></p>

<form>
  <table class="seedform">
    <?= $this->form->text('name') ?>
    <?= $this->form->field(
          'name_public',
          array(
            'hint' => 'name_public_hint', 
            'type' => 'select', 
            'values' => array(
              'show' => $this->t('show_name_yes'), 
              'hide' => $this->t('show_name_no')
            )
          )
        ); ?>
    <?= $this->form->text('email', array('hint' => 'email_hint')) ?>
    <?= $this->form->text('city', array('hint' => 'city_hint')) ?>
    <?= $this->form->text('occupation') ?>
    <?= $this->form->select('year_of_birth', array('start' => 1900, 'end' => 2010, 'empty' => true)) ?>
    <?= $this->form->textarea('tell_us_your_story') ?>
    <?= $this->form->time('from') ?>
    <?= $this->form->time('to', array('hint' => 'period_hint')) ?>
    <?= $this->partial('partial/multilocation.php') ?>
</table>
</form>
     <? /*

Occupation: [Text Field]

Year of Birth: [1900-2010]

*Tell us your story:
[Scrollable Text Field]

What period of time does this story cover? 
From: [2011-2015] [January-December] [1-31] Hour: [0-23]
To: [2011-2015] [January-December] [1-31] Hour: [0-23]
{{ NOTE: the default should be blank - so that they don't have to specify any time or only a partial level of detail }}

Where did your story take place? Where there several locations mentioned in your story? Please add one or more locations below and, if possible, indicate when you were there.
[Google Map and location search field same as on contribute form, with coordinates shown, zoomable, and movable pin] 
When were you there? Add if you remember.
From: [2011-2015] [January-December] [1-31] Hour: [0-23]
To: [2011-2015] [January-December] [1-31] Hour: [0-23]

[Add Location]
{{ NOTE: Since multiple locations are possible, you'll need a relational table right? a "testimonials" table with, a "locations" table, and a testimonials-to-locations table - handle the timestamps for the locations as you see fit. }}

[Add Additional Locations]
{{ NOTE: After the first location has been added, these two buttons should appear allowing the user to optionally add more locations. Also a [Delete Location] should appear under the added location coordinates. Implement as you see fit. Should the map of previous location (but not coordinates) disappear and a new one appear? Or, should there be a single map to the right with each added location pin on it (perhaps red for already added locations and blue for the current searched location that has not yet been added?) I'm not sure what is best here, whatever you think is best here. Please let me know if you have questions on this. }}

*Do you accept [these terms] and grant us permission to include your story in the digital archive and allow all visitors to the archive read it? [Yes/No] 
You must grant us permission if you wish to add the story to our archive. Your email will not be made public. All other information, except for your name, if you chose to hide it, can be found by visitors to the archive. After submission, a link will be sent to the email address above that will allow you to edit or remove your contribution from the archive after submission. 

{{ NOTE: "these terms" should pop-up link to a blank terms.html file which I will fill with text after consultation with our legal contacts here at Harvard }}

[Submit Testimonial]

SUBMISSION:

When the form is submitted, it should thank the user for the submission (use standard header and footer) and offer a link back to the home page:

Thank you for your submission to the digital archive. A link will be sent to the email address you indicated that will allow you to edit or remove your contribution from the archive. [Return to Homepage]

 NOTE: Check to see which language was used to submit the form la=ja, la=zh, la=ko. For now, this will output English no matter what, but I'll replace the English in your script myself with Japanese, Chinese, and Korean as those translations become available. 

____

When submitted, the form should send two emails. One copy to info@jdarchive.org and one to the email address submitted.

Check to see which language was used to submit the form la=ja, la=zh, la=ko. For now, this will send out and email in English no matter what, but I'll replace the English in your script myself with Japanese, Chinese, and Korean as those translations become available. Here is the English text for the email:


Thank you for submitting your testimonial to the Digital Archive of Japan's 2011 Disasters. We are in the process of designing an interface for the archive that will allow visitors to search submitted testimonials. Please visit us again in the coming year as we progress towards that goal.

If you wish to edit or cancel your submitted story, please visit the following link:

[LINK] 
{{ NOTE: This will let them edit the submission so should look just like the original form but with data filled in and the addition of a [Delete this Submission] link (with a simple javascript alert asking for confirmation of deletion). It should link to the edit page something like testimonial.php?e=xxxxxxxxx Please make sure the xxxxxx is not the real raw consecutive ID number for the entry, but a "padded" combination of number/letters so that people will not be able to (easily) guess other entries to edit. }}

If you have any questions about the project, please contact us at info@jdarchive.org

Sincerely,

The Digital Archive of Japan's 2011 Disasters
Edwin O. Reischauer Institute of Japanese Studies
Harvard University
http://jdarchive.org/

    */?>