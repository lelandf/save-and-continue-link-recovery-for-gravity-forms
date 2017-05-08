=== Save and Continue Link Recovery for Gravity Forms ===
Contributors: lelandf
Tags: spam
Requires at least: 4.7
Tested up to: 4.7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: LICENSE

If a Gravity Forms form submitter loses their "Save and Continue" Link, this will help you recover it.

== Description ==

Gravity Forms 1.9 introduced a feature called [Save and Continue](https://www.gravityhelp.com/gravity-forms-v1-9-save-continue/) which allows form submitters to save their progress, and continue it later.

When a form submitter saves their work, they are given a unique URL (a password, of sorts) that will allow them to pick up where they left off.

If they lose this URL, they may ask you (the site administrator) for assistance.

By default, there is no way to recover this unique URL without going directly to the database and finding it, which can be a tedious process.

Instead, you can install this plugin, which will list all the incomplete submissions in a simple table format. Each row in the table includes the following information about each:

* Form ID
* Date/Time Created
* Email address (only available if user emailed recovery link to themselves)
* IP Address
* UUID (this is the “password” users use to pick up where they left off)
* A “View Entry” link (this is what you give the form submitter who lost their URL)

This plugin does not provide an admin interface to manipulate incomplete submissions, but you can click the “View Entry” link to edit submissions on the frontend (just like a user returning to finish an incomplete form could).

For more advanced functionality related to incomplete submissions in Gravity Forms, I suggest looking into the [Partial Entries add-on](http://www.gravityforms.com/add-ons/partial-entries/), available to Gravity Forms Developer License holders.

The idea behind this plugin is to provide a very basic way of recovering “Save and Continue” links without having to search the database directly, and nothing more.

Please note that Gravity Forms is a commercial plugin, which I am not affiliated with in any way.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/save-and-continue-link-recovery-for-gravity-forms` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Find the “Save and Continue Link Recovery” admin page under the “Tools” menu.

== Frequently Asked Questions ==

= Why can I activate this plugin when Gravity Forms is not even installed? =

Technically, this plugin does not require Gravity Forms to function. All it does it read a database table that Gravity Forms uses to store incomplete submissions.

Since that database table may persist even after Gravity Forms is deleted, I decided to not require Gravity Forms’s presence to use it.

= Can I use this plugin to recover Save and Continue links for other forms plugins? =

No. This only works for Gravity Forms. Other forms plugins may handle Save and Continue links in different ways.

If I ever come across a similar need for another form plugin, I’ll make a new plugin just for that. This one will only ever work with Gravity Forms.

== Changelog ==

= 1.0.0 =
* Initial release
