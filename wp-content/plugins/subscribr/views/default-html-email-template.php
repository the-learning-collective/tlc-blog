<?php
/**
 * default-html-email-template.php
 *
 * Modify this to suit your needs by copying it into your active
 * theme folder into a subdirectory named `subscribr`.
 * 
 * Available variables: %post_title%, %post_date%, %post_excerpt%, %permalink%, %site_name%, %site_url%, %user_ip%, %notification_label%, %notifications_label%, %profile_url%
 *
 */


$html_mail_body = "
<p>A new post matching one of your %notifications_label% is available on %site_name%:</p>
<h3>%post_title%  (%post_date%)</h3>
<p>%post_excerpt%</p>
<p>Permalink: <a href='%permalink%'>%permalink%</a></p>
<hr />
<p>You received this email because you asked to be notified when new updates are published.</p>
<p>Manage your %notifications_label% or unsubscribe here: <a href='%profile_url%'>%profile_url%</a></p>
<hr />
<p><strong>&mdash; The %site_name% Team</strong></p>";
