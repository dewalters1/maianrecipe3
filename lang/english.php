<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: English Language File
  Written by David Ian Bennett
----------------------------------------------*/

/******************************************************************************************************
 * LANGUAGE FILE - PLEASE READ                                                                        *
 * This is a language file for the Maian Recipe script. Edit it to suit your own preferences.         *
 * DO NOT edit the variable names in any way and be careful NOT to remove any of the                  *
 * apostrophe`s (') that contain the variable info. This will cause the script to malfunction.        *
 * USING APOSTROPHES IN MESSAGES                                                                      *
 * If you need to use an apostrophe, escape it with a backslash. ie: d\'apostrophe                    *
 * SYSTEM VARIABLES                                                                                   *
 * Words enclosed with braces are system variables and should not be altered or removed. ie: {count}  *
 * The system will not fail if you accidentally delete these, but some language may not display       *
 * correctly.                                                                                         *                                                                            *
 ******************************************************************************************************/

/*---------------------------------------------
  CHARACTER SET
  For encoding HTML characters
----------------------------------------------*/


$charset         = 'utf-8';
$mail_charset    = 'utf-8';


//------------------------------
// templates/add-recipe.tpl.php
//------------------------------


$ps_addrecipe    = 'If you think you have a recipe that might interest our visitors, please submit it using the form below. Note that this recipe must <b>NOT</b> be someone else`s recipe
                    copied off another website. If your recipe is found to be written by another person, it will be removed from our database immediately.<br /><br />
                    Please complete all fields unless stated otherwise.';
$ps_addrecipe2   = '(Not Published)';
$ps_addrecipe3   = 'Enter Name &amp; E-Mail Address:';
$ps_addrecipe4   = 'Enter Recipe Name &amp; Choose Category:';
$ps_addrecipe5   = 'Enter Ingredients Required &amp; Cooking Instructions (<a href="http://en.wikipedia.org/wiki/HTML" title="Hypertext Markup Language" onclick="window.open(this);return false">HTML</a> is not allowed):';
$ps_addrecipe6   = 'Upload Recipe Pictures (Max: {max}) - This is Optional:';
$ps_addrecipe7   = 'Recipe Name';
$ps_addrecipe8   = 'Recipe Category';
$ps_addrecipe9   = 'Ingredients';
$ps_addrecipe10  = 'Cooking Instructions';
$ps_addrecipe11  = 'Allowed Image Extensions: <b>{extensions}</b> ONLY';
$ps_addrecipe12  = 'Max File Size Per Image: <b>{size}</b>';
$ps_addrecipe13  = 'One or more of your pictures have an invalid file extension. Valid file extensions are shown above. Please re-check..';
$ps_addrecipe14  = 'One or more of your pictures have a file size greater than "{size}". Please re-check..';
$ps_addrecipe15  = 'Please enter some ingredients..';
$ps_addrecipe16  = 'Please enter some cooking instructions..';
$ps_addrecipe17  = 'One or more invalid image files. Valid files are: {extensions}';
$ps_addrecipe18  = 'Thank You - Recipe Submitted Successfully!';
$ps_addrecipe19  = 'Your recipe will now be reviewed by our team and if accepted, will appear in our database<br /><br />E-mail confirmation will follow as soon as this procedure is completed.<br /><br />We appreciate your thoughtfulness in submitting your recipe for other people.<br /><br />Kind regards,<br />{website_name}';
$ps_addrecipe20  = 'Your recipe is now live in our database.<br /><br />Note that your recipe is open to review by our team.<br /><br />We appreciate your thoughtfulness in submitting your recipe for other people.<br /><br />Kind regards,<br />{website_name}';
$ps_addrecipe21  = 'Please enter a name for your new recipe..';
$ps_addrecipe22  = 'New Recipe Submitted!';
$ps_addrecipe23  = 'Thank you for your Recipe!';


//------------------------------
// templates/category.tpl.php
//------------------------------


$ps_category     = 'Free {cat} Recipes:';
$ps_category2    = 'Free {cat} ({subcat}) Recipes:';
$ps_category3    = 'Viewing Recipes: {cat} ({count})';
$ps_category4    = 'Related Categories';
$ps_category5    = 'Most Popular Recipes';
$ps_category6    = 'Please choose a recipe from below or a sub category from the right menu if applicable:';
$ps_category7    = 'This category has 0 recipes, so please check back later..';
$ps_category8    = 'by';
$ps_category9    = 'No related categories!';
$ps_category10   = 'RSS Feed';


//-----------------------------------
// templates/contact-us.tpl.php
// templates/tell-a-friend.tpl.php
//-----------------------------------


$ps_contact      = 'Please enter your name..';
$ps_contact2     = 'Please enter your e-mail address..';
$ps_contact3     = 'Please enter some comments..';
$ps_contact4     = 'Please enter the spam prevention word..';
$ps_contact5     = 'If you need to contact us, please use the form below';
$ps_contact6     = 'Your Name';
$ps_contact7     = 'Your E-Mail Address';
$ps_contact8     = 'Comments';
$ps_contact9     = 'Send';
$ps_contact10    = 'Please complete the following spam prevention code - (click image to refresh word)';
$ps_contact11    = 'Enter Word';
$ps_contact12    = 'Message Sent - Thank You!';
$ps_contact13    = 'A member of staff will respond as soon as possible<br /><br />Kind regards,<br />{website_name}';
$ps_contact14    = 'General Enquiry!';
$ps_contact15    = 'Thanks for Contacting Us!';
$ps_contact16    = 'Recipe: {recipe} (<a href="javascript:history.go(-1)" title="Cancel">Cancel</a>)';
$ps_contact17    = 're: {recipe}'.defineNewline().'{url}'.defineNewline().'----------------------------------------------------------'.defineNewline().defineNewline().'Start your comments here..';
$ps_contact18    = 'Your Friends Name';
$ps_contact19    = 'Your Friends E-Mail';
$ps_contact20    = 'Please enter your friends name..';
$ps_contact21    = 'Please enter your friends e-mail address..';
$ps_contact22    = 'Tell a Friend about: {recipe} (<a href="javascript:history.go(-1)" title="Cancel">Cancel</a>)';
$ps_contact23    = '{recipe}'.defineNewline().'{url}'.defineNewline().'----------------------------------------------------------'.defineNewline().defineNewline().'Start your comments here..';
$ps_contact24    = 'Recipe Recommmendation from {name}!';
$ps_contact25    = 'Thanks for recommending a recipe!';
$ps_contact26    = 'Tell a Friend Report!';
$ps_contact27    = 'Thanks for recommending one of our recipes to your friend &quot;{friend}&quot;<br /><br />An e-mail has been sent with your recommendation.<br /><br />Kind regards,<br />{website_name}';


//------------------------------
// templates/header.tpl.php
//------------------------------


$ps_header       = 'Home';
$ps_header2      = 'CATEGORIES';
$ps_header3      = 'SEARCH RECIPES';
$ps_header4      = 'Search';
$ps_header5      = 'Currently listing {rcount} recipes in {ccount} categories!';
$ps_header6      = 'Add Recipe';
$ps_header7      = 'About Us';
$ps_header8      = 'Contact Us';
$ps_header9      = '{website_name}: Delicious FREE recipes for your enjoyment!';
$ps_header10     = 'Latest Recipes';
$ps_header11     = 'Free Recipe @ {website_name}: {recipe} ({category})';
$ps_header12     = 'You need flash installed to view this header!';
$ps_header13     = 'Please enter your keywords..';


//------------------------------
// templates/index.tpl.php
// templates/about-us.tpl.php
//------------------------------


$ps_index        = 'Welcome to {website_name}';
$ps_index2       = 'We offer free and tasty recipes for your cooking enjoyment. From exotic foods to mouth watering desserts, we are sure you`ll find something to test your culinary skills. Enjoy!';
$ps_index3       = 'Our Recipe Categories';
$ps_index4       = 'Our Latest Recipes';
$ps_index5       = 'Our Most Popular Recipes';
$ps_index6       = '404 Page Not Found';
$ps_index7       = 'This page does not exist or is currently disabled by admin. If you bookmarked this page, remove it from your bookmarks or please try again later. Thanks!';


//------------------------------
// templates/recipe.tpl.php
//------------------------------


$ps_recipe       = 'Recipe Links';
$ps_recipe2      = 'Rate this Recipe';
$ps_recipe3      = 'Comment on this Recipe';
$ps_recipe4      = 'Jump to Category';
$ps_recipe5      = 'Other Recipes in this Category';
$ps_recipe6      = 'Recipe Pictures - Hover cursor to scroll if several images';
$ps_recipe7      = 'Visitor Comments';
$ps_recipe8      = 'Contact us about this Recipe';
$ps_recipe9      = 'Tell a Friend about this Recipe';
$ps_recipe10     = 'Printer Friendly Version';
$ps_recipe11     = 'Ingredients';
$ps_recipe12     = 'Cooking Instructions';
$ps_recipe13     = 'No Recipes - Check Back Later';
$ps_recipe14     = 'Add New Recipe';
$ps_recipe15     = 'Left by: {name} ({date})';
$ps_recipe16     = 'This recipe currently has 0 comments. Add your own comment in the right hand menu.';
$ps_recipe17     = 'Recipe Cloud Tags';
$ps_recipe18     = 'This recipe currently has 0 pictures.';
$ps_recipe19     = '- Recipe Hit Count -';
$ps_recipe20     = 'Your Name';
$ps_recipe21     = 'Your E-Mail (Not Published)';
$ps_recipe22     = 'Your Comments';
$ps_recipe23     = 'For spam prevention, enter code';
$ps_recipe24     = 'Click to refresh captcha code';
$ps_recipe25     = 'vote';
$ps_recipe26     = 'votes';
$ps_recipe27     = 'Currently';
$ps_recipe28     = 'Rating';
$ps_recipe29     = 'This is "Static"';
$ps_recipe30     = 'out of';
$ps_recipe31     = 'cast';
$ps_recipe32     = 'Current rating';
$ps_recipe33     = 'Thanks for voting!';
$ps_recipe34     = 'Submitted by:';
$ps_recipe35     = 'Date Added:';
$ps_recipe36     = 'Free Recipe provided by: {website_name} &copy; '.date('Y').'<br />{website_url}';
$ps_recipe37     = 'A new comment has been posted!';
$ps_recipe38     = 'Thanks for your Comments!';
$ps_recipe39     = 'Thank you, your comments will be reviewed shortly!';
$ps_recipe40     = 'Thank you, your comments have been added!<br />Please close this window and refresh the main page.';
$ps_recipe41     = 'Listed in: <a href="{url}" title="{cat}">{cat}</a>';
$ps_recipe42     = 'Listed in: <a href="{purl}" title="{parent}">{parent}</a> / <a href="{curl}" title="{child}">{child}</a>';
$ps_recipe43     = 'No cloud tags to display';


//------------------------------
// templates/search.tpl.php
//------------------------------


$ps_search       = 'Search Results:';
$ps_search2      = 'Your search for &quot;{keys}&quot; generated {count} results:';
$ps_search3      = 'Filter Search by Category';
$ps_search4      = 'View Recipes by Contributor';


//--------------------------
// admin/templates/add.php
//--------------------------


$add             = 'Name of Recipe';
$add2            = 'Recipe Category';
$add3            = 'Required Ingredients';
$add4            = 'Cooking Instructions';
$add5            = 'Add New Recipe';
$add6            = 'Recipe Pictures';
$add7            = 'Meta Description';
$add8            = 'Meta Keywords';
$add9            = 'New Recipe Added';
$add10           = 'Enable Comments for this Recipe';
$add11           = 'Enable Ratings for this Recipe';
$add12           = 'Enable/Disable this Recipe';
$add13           = 'Submitted by';
$add14           = 'New Recipe Added';


//--------------------------
// admin/templates/edit.php
//--------------------------


$edit            = 'Update Recipe';
$edit2           = 'Recipe Updated';
$edit3           = 'Back to Recipe List';
$edit4           = 'Date Added (YYYY-MM-DD)';
$edit5           = 'Hits';


//--------------------------
// admin/control/header.php
//--------------------------


$header          = 'Administration';
$header2         = 'Add New Recipe';
$header3         = 'Recipes';
$header4         = 'Settings';
$header5         = 'Menu';
$header6         = 'Logout';
$header7         = 'Support';
$header8         = 'Home';
$header9         = 'Categories';
$header10        = 'Enter keywords or recipe ID..';
$header11        = 'Enter keywords or visitor name..';


//-----------------------------
// admin/templates/home.php
//-----------------------------


$home            = '<b>WARNING!</b><br /><br />Please remove the \'/install/\' folder from your installation directory.';
$home2           = 'Welcome to the Maian Recipe Administration Centre!<br /><br />Use the links above to manage your recipe system. If help tips are enabled, hover your cursor over applicable text when prompted to do so or look for the <img src="templates/images/info.png" alt="" title="" '.hoverHelpTip('This is an example. To disable help tips see the docs!').' /> symbols and hover your cursor over them.<br /><br />If you like the system and would like to show
                    your appreciation, please consider a small donation by using the link on the right. Donations help towards to continued development of Maian Recipe.<br /><br />For details on how to get started with your recipe system, please see the documentation.<br /><br />
                    Finally, if you use a feed reader, you can subscribe to the Maian Script World RSS feed for updates.<br /><br />
                    I hope you enjoy  &amp; have fun with Maian Recipe! Please report any bugs you find!<br /><br />
                    <b>David Ian Bennett - Maian Script World</b><br />Designer/Programmer
                    ';
$home3           = 'Donations';
$home4           = 'Quick Overview';
$home5           = 'Help/Support';
$home6           = '';
$home7           = 'Requiring Approval';
$home8           = 'Recipes';
$home9           = 'Pictures';
$home10          = 'Comments';
$home11          = 'Categories';
$home12          = 'Sub Categories';
$home13          = 'Copyright Removal';
$home14          = 'Development/Bug Fixes/Updates';
$home15          = 'Disabled';


//--------------------------
// admin/templates/cats.php
//--------------------------


$cats            = 'Parent Category';
$cats2           = 'Add New Category';
$cats3           = 'Category Name';
$cats4           = 'Category Comments';
$cats5           = 'There are currently 0 categories in the database';
$cats6           = 'Current Categories (Parent/Children) - <span style="font-weight:normal">Click to Edit, Click Cross to Delete - Disabled categories are highlighted</span>';
$cats7           = 'Meta Description';
$cats8           = 'No Children';
$cats9           = 'New Category Added';
$cats10          = 'Meta Keywords';
$cats11          = 'Update Category';
$cats12          = 'Category Deleted';
$cats13          = 'Child Category of';
$cats14          = 'Category Type';
$cats15          = 'Enable Comments for this Category';
$cats16          = 'Enable Ratings for this Category';
$cats17          = 'Can Visitors post Recipes in this Category';
$cats18          = 'Enable/Disable this Category';
$cats19          = 'New Category Added';
$cats20          = 'Category Updated';
$cats21          = 'Selected Category Deleted';


//--------------------------------------
// admin/templates/approve-comments.php
// admin/templates/edit-comment.php
// admin/templates/comments.php
//--------------------------------------


$comments        = 'Approve Comments';
$comments2       = 'Use the checkboxes to process comments and the links to view/edit comments before approval';
$comments3       = 'There are currently 0 comments awaiting approval';
$comments4       = 'View/Edit';
$comments5       = 'Process Selected Comments';
$comments6       = 'Approve Comments';
$comments7       = 'Reject Comments';
$comments8       = 'Left by <b>{name}</b> on <b>{date}</b>';
$comments9       = 'Select All';
$comments10      = 'Filter by Recipe';
$comments11      = 'There are currently 0 comments awaiting approval for this recipe';
$comments12      = 'Comment(s) Approved';
$comments13      = 'Comment(s) Rejected';
$comments14      = 'Edit Comment';
$comments15      = 'Comments';
$comments16      = 'Name';
$comments17      = 'E-Mail';
$comments18      = 'Recipe';
$comments19      = 'Update Comments';
$comments20      = 'Comment Updated';
$comments21      = 'Manage Recipe Comments - <span style="font-weight:normal">Use the drop down menu to change recipe</span>:  (<a href="{url}" title="Cancel">Cancel</a>)';
$comments22      = '<b>{count}</b> comment(s)';
$comments23      = 'Contact: {name}';
$comments24      = 'This recipe has 0 comments in the database';
$comments25      = 'With Selected';
$comments26      = 'Send E-Mails';
$comments27      = 'All Recipes';
$comments28      = 'Your Comments have been Approved!';
$comments29      = 'Your Comments have been Rejected!';
$comments30      = 'Comment(s) Deleted';
$comments31      = 'Remove Selected Comments';


//-----------------------------
// admin/templates/login.php
//-----------------------------


$login           = 'Enter Username';
$login2          = 'Enter Password';
$login3          = 'Login';
$login4          = 'Remember Me?';
$login5          = 'Invalid username. Please try again..';
$login6          = 'Invalid password. Please try again..';


//-------------------------------
// admin/templates/pictures.php
//-------------------------------


$pictures        = 'Select Recipe';
$pictures2       = 'Manage Recipe Pictures - <span style="font-weight:normal">Use the drop down menu to change recipe</span>:  (<a href="{url}" title="Cancel">Cancel</a>)';
$pictures3       = 'Upload Pictures';
$pictures4       = 'Manage Pictures - Click to view, click link to delete:';
$pictures5       = 'Add New Pictures';
$pictures6       = 'This recipe has 0 pictures in the database';
$pictures7       = 'New Picture(s) Added';
$pictures8       = 'Picture Deleted';
$pictures9       = 'Update Pictures';
$pictures10      = 'Delete ALL Pictures';
$pictures11      = 'All Pictures Deleted';


//-------------------------------
// admin/templates/ratings.php
//-------------------------------


$ratings         = 'View by Rating - <span style="font-weight:normal">Here you can view your recipes by visitor ratings if this feature is enabled:</span> (<a href="?p=recipes" title="Cancel">Cancel</a>)';
$ratings2        = 'Best Rated';
$ratings3        = 'Worst Rated';
$ratings4        = 'Filter by Category';
$ratings5        = 'There are currently 0 ratings in the system or this feature is disabled';
$ratings6        = 'This category has 0 recipe ratings in the system.';
$ratings7        = 'Not Enabled';
$ratings8        = 'Most Votes';
$ratings9        = 'Least Votes';
$ratings10       = 'View Recipe';
$ratings11       = 'Edit Recipe';


//---------------------------------------
// admin/templates/recipes.php
// admin/templates/approve-recipes.php
//---------------------------------------


$recipes         = 'Recipe Links';
$recipes2        = 'Filter/Order by Options';
$recipes3        = 'Reset Recipe Ratings';
$recipes4        = 'Reset Recipe Hits';
$recipes5        = 'Update';
$recipes6        = 'There are currently <b>{count}</b> recipes in <b>{cats}</b> categories - Click recipe to edit';
$recipes7        = 'Add New Recipe';
$recipes8        = 'There are currently <b>{count}</b> recipes in this category - Click recipe to edit';
$recipes9        = 'There are currently 0 recipes in the database';
$recipes10       = 'Info';
$recipes11       = 'Approve Comments';
$recipes12       = 'Delete All Comments';
$recipes13       = 'Delete All Recipes';
$recipes14       = 'Approve Recipes';
$recipes15       = 'Filter by Category';
$recipes16       = 'All Categories';
$recipes17       = 'Reset/Delete Options by Category';
$recipes18       = 'Added';
$recipes19       = 'Submitted by';
$recipes20       = 'Rating';
$recipes21       = 'Hits';
$recipes22       = 'Comments';
$recipes23       = 'Most Hits';
$recipes24       = 'Least Hits';
$recipes25       = 'Most Comments';
$recipes26       = 'Least Comments';
$recipes27       = 'Highest Rating';
$recipes28       = 'Lowest Rating';
$recipes29       = 'All Recipes A-Z';
$recipes30       = 'Newest Recipe';
$recipes31       = 'Oldest Recipe';
$recipes32       = 'Remove Selected Recipes';
$recipes33       = 'Pictures';
$recipes34       = 'Manage Pictures';
$recipes35       = 'Search Results - <span style="font-weight:normal">Your search results are shown below</span> (<a href="?p=recipes" title="Cancel">Cancel</a>)';
$recipes36       = 'Manage Pictures';
$recipes37       = 'Use the checkboxes below to approve or reject recipes. Click a recipe to edit before approval if required. Pictures can also be updated before a recipe is processed. Click info and then the picture count';
$recipes38       = 'There are currently 0 recipes requiring approval';
$recipes39       = 'Process Selected Recipes';
$recipes40       = 'Not available until recipe is approved';
$recipes41       = 'Manage Comments';
$recipes42       = 'Selected Recipes Deleted';
$recipes43       = 'Approve Recipes';
$recipes44       = 'Reject Recipes';
$recipes45       = 'Recipe(s) Approved';
$recipes46       = 'Recipe(s) Rejected';
$recipes47       = 'Your Recipe has been Approved!';
$recipes48       = 'Your Recipe has been Rejected!';
$recipes49       = 'View by Rating';
$recipes50       = 'All Contributors';
$recipes51       = 'Manage Comments';
$recipes52       = 'Show All Info';
$recipes53       = 'Hide All Info';
$recipes54       = 'out of';
$recipes55       = 'Status';
$recipes56       = 'Enabled';
$recipes57       = 'Disabled';


//--------------------------------
// admin/templates/settings.php
//--------------------------------


$settings        = 'Webmaster E-Mail Address';
$settings2       = 'Default Meta Description';
$settings3       = 'Language File';
$settings4       = 'Website Name';
$settings5       = 'How Many Recipes to Show Per Page';
$settings6       = 'Yes';
$settings7       = 'No';
$settings8       = 'Update Settings';
$settings9       = 'Default Meta Keywords';
$settings10      = 'Settings Updated';
$settings11      = 'Enable Comment Approval';
$settings12      = 'Enable Recipe Approval';
$settings13      = 'Enable Spam Prevention Captcha';
$settings14      = 'Full Server Path to Install Folder';
$settings15      = 'SMTP Settings';
$settings16      = 'Enable SMTP';
$settings17      = 'SMTP Host';
$settings18      = 'SMTP Username';
$settings19      = 'SMTP Password';
$settings20      = 'SMTP Port';
$settings21      = 'Enable Search Engine Friendly URLs';
$settings22      = 'Installation Folder URL (http)';
$settings23      = 'Visitor Image Settings';
$settings24      = 'Max Allowed Image Uploads Per Recipe';
$settings25      = 'Valid Image Extensions';
$settings26      = 'Auto Resize Dimensions (Width,Height)';
$settings27      = 'Max File Size Per Image';
$settings28      = 'Settings Updated';
$settings29      = 'Enable RSS Feed';
$settings30      = 'Enable Cloud Tags';


//--------------------------
// General
//--------------------------


$script          = 'Maian Recipe';
$script2         = 'v3.0';
$script3         = 'Powered by';
$script4         = 'Please wait....';
$script5         = 'Cancel';
$script6         = 'Hover cursor over headings for help tips';
$script7         = 'First Page';
$script8         = 'Last Page';
$script9         = 'All Rights Reserved';
$script10        = 'Action Successfully Completed';
$script11        = 'Close';
$script12        = 'Optional';
$script13        = 'Edit';
$script14        = 'Delete';
$script15        = 'Quick Jump';
$script16        = 'Print';
$script17        = 'Security Alert: The following should be fixed immediately:';
$script18        = 'Installation Folder (<b>/install/</b>) should be renamed or removed..';
$script19        = 'Default cookie name must be changed in "<b>control/connect.inc.php</b>" file..';
$script20        = 'Default cookie key must be changed in "<b>control/connect.inc.php</b>" file..';
$script21        = 'Page Not Found';
$script22        = 'You have enabled search engine friendly urls in the settings, but have <b>not</b> read the documentation correctly!!!';


/*-----------------------------
  For RSS feed
-------------------------------*/


$msg_rss         = 'Latest recipes @ {website_name}';
$msg_rss2        = 'These are the latest recipes to be added at {website_name}';
$msg_rss3        = 'Recipe: ';
$msg_rss4        = 'Latest {category} recipes @ {website_name}';


/*-----------------------------------------------------------------------------------------------------
  JAVASCRIPT VARIABLES
  IMPORTANT: If you want to use apostrophes in these variables, you MUST escape them with 3 backslashes
             Failure to do this will result in the script malfunctioning on javascript code.
  EXAMPLE: d\\\'apostrophe

  Alternatively use double quotes where possible.
------------------------------------------------------------------------------------------------------*/


$javascript      = 'Confirm action..\n\nAre you sure?';
$javascript2     = 'Please include a category name..';
$javascript3     = 'Form Errors';
$javascript4     = 'Delete parent category\n\nThis will clear all data associated with this category including child categories, recipes and images...\n\nAre you sure?';
$javascript5     = 'Help/Information';
$javascript6     = 'Enter category name. Max 200 Characters.';
$javascript7     = 'Meta description. For search engines. This is optional.';
$javascript8     = 'Meta keywords. For search engines. This is optional.';
$javascript9     = 'Specify category type. Note: If you make a parent category a child category, any children that existed in the original parent will also be made children of the new parent category.';
$javascript10    = 'Category comments. These are optional. HTML may be used if required.';
$javascript11    = 'Do you wish to enable comments for this category? Comments can be enabled/disabled per recipe, but comments must be active in a category to function.';
$javascript12    = 'Do you wish to enable ratings for this category? Ratings can be enabled/disabled per recipe, but ratings must be active in a category to function.';
$javascript13    = 'Can visitors post recipes in this category? If this is a parent category, disallowing recipe posts in this category will also auto disable its children.<br /><br />Also see the settings for visitor submission restrictions.';
$javascript14    = 'Enable/disable this category. If this is a parent category, disallowing this category will also auto disable its children. Useful if you want to add recipes to a category before you make it public.';
$javascript15    = 'If checked resets all hits for all recipes in specified category or categories';
$javascript16    = 'If checked resets all ratings for all recipes in specified category or categories';
$javascript17    = 'If checked deletes all comments for all recipes in specified category or categories';
$javascript18    = 'Overwrites first 3 options and deletes all recipe data and recipe images for all recipes in specified category or categories<br /><br />Use the checkboxes to delete selected recipes only';
$javascript19    = 'Filter/Order by options - Choose category to filter recipes by category and/or use the order by options to order based on criteria.';
$javascript20    = 'Hold down Ctrl key to make selections. If "All Categories" is selected, this will be the default and will overwrite individual selections.';
$javascript21    = 'Please choose at least 1 category option..';
$javascript22    = 'Please choose at least 1 processing option..';
$javascript23    = 'Please choose at least 1 recipe..';
$javascript24    = 'Logout and terminate session..\n\nAre you sure?';
$javascript25    = 'Your website name. Max 100 Characters.';
$javascript26    = 'Installation url to your recipe installation. WITH trailing slash.<br /><br />ie: http://www.yoursite.com/recipe/';
$javascript27    = 'Full server path to your recipe installation. WITH trailing slash.<br /><br />ie: /home/server_name/public_html/recipe/<br /><br />If you are unsure of your actual server path, contact your host.';
$javascript28    = 'Specify language file. Create new language file if applicable and upload into /lang/ directory.<br /><br />Available language files can be downloaded from the Maian Script World website.';
$javascript29    = 'How many recipes do you want to show per page?';
$javascript30    = 'This enables the search engine friendly url system. Usually for Apache systems ONLY. Your server MUST support .htaccess &amp; mod_rewrite for this to work. See the docs for more info.';
$javascript31    = 'Specify your e-mail address. Certain notifications can be disabled. See the docs for more information.';
$javascript32    = 'Default meta description. For search engines. This should contain a brief description of your website. This is overwritten if recipe or category descriptions are specified.';
$javascript33    = 'Default meta keywords. For search engines. This should contain keywords relevant to your site. This is overwritten if recipe or category keywords are specified.';
$javascript34    = 'If comments are enabled in a category or for a specific recipe, do you wish to approve comments before they appear on your site?';
$javascript35    = 'If recipe submissions are enabled in a category or for a specific recipe, do you wish to approve them before they appear on your site?';
$javascript36    = 'This enables the spam prevention captcha image feature for forms. For this to work your server is required to have the GD graphic library installed and enabled. Enabling this helps prevent bots from auto submitting your forms.';
$javascript37    = 'When visitors submit recipes, do you want them to also be able to upload some pictures? If yes, enter a number higher than 0. Set to 0 for no images.';
$javascript38    = 'If image uploads are enabled, specify allowed extensions. Extension ONLY separated by a pipe (|). No period symbols. This is NOT case sensitive. jpg is the same as JPG.';
$javascript39    = '<b>For JPG/JPEG ONLY!!</b> If images exceed the size specified here they will be auto resized. For example: 640,480 (width,height) would resize images bigger than these dimensions. Aspect ratio is taken into account when resizing. You MUST specify both parameters seperated by a comma and both should be higher than 0.<br /><br />Set to 0 for no resizing and to have images retain their upload dimensions.';
$javascript40    = 'Specify max size for images. This is the first check. If images exceed the max size here they are rejected, regardless of their dimensions. Specify size in bytes ONLY. Examples:<br /><br />1024 x 250 = 256000 (250KB)<br />1024 x 1024 = 1048576 (1MB) etc<br /><br />Set to 0 for no restrictions.';
$javascript41    = 'Enable the SMTP mail option if the PHP mail() function is not working. Some servers require SMTP for sending mail. If you are unsure check with your host. Specify username/password if required.';
$javascript42    = 'SMTP mail port. Usually 25 or 26. Check with your host if you aren`t sure.';
$javascript43    = 'Please specify a recipe name..';
$javascript44    = 'Please include some ingredients..';
$javascript45    = 'Please include some cooking instructions...';
$javascript46    = 'Enter recipe name. Max 200 Characters.';
$javascript47    = 'Specify recipe category.';
$javascript48    = 'If this recipe was submitted by someone, enter their name. This is optional.';
$javascript49    = 'Do you wish to enable comments for this recipe? This option must also be enabled in the relevant category first. The category option has priority over single recipe.';
$javascript50    = 'Do you wish to enable ratings for this recipe? This option must also be enabled in the relevant category first. The category option has priority over single recipe.';
$javascript51    = 'Enable recipe. If disabled not viewable to the public. Useful if you need to remove a recipe from public view for any reason.';
$javascript52    = 'Specify recipe ingredients. HTML may be used here if required.';
$javascript53    = 'Specify recipe cooking instructions. HTML may be used here if required.';
$javascript54    = 'Upload recipe pictures. This can be done now or later on using the "Manage Pictures" option on the "Recipes" page in the right hand menu. There are no restrictions on admin pictures.';
$javascript55    = 'Specify meta description for recipe. For search engines. If left blank, recipe name is used.';
$javascript56    = 'Specify meta keywords for recipe. For search engines. If left blank, defaults to category keywords, then settings default.';
$javascript57    = 'Manually adjust recipe hit count if required.';
$javascript58    = 'This is the date the recipe was added. Update if required.';
$javascript59    = 'Please select at least 1 image..';
$javascript60    = 'Please select at least 1 comment..';
$javascript61    = 'When you approve or reject comments the system can send an e-mail to the person who left the comment to inform them of your decision. If you elect not to send e-mails, comment is processed without e-mails being sent.';
$javascript62    = 'When you approve or reject recipes the system can send an e-mail to the person who submitted the recipe to inform them of your decision. If you elect not to send e-mails, recipe is processed without e-mails being sent.';
$javascript63    = 'Inclusive of pictures for unapproved recipes';
$javascript64    = 'RSS feeds can be useful for people who use feed readers to track website updates. If you enable this feature, an RSS link will appear for the latest recipes. For more info on RSS feeds, see the docs.';
$javascript65    = '<b>&copy; Wikipedia</b>: A tag cloud or word cloud is a visual depiction of user-generated tags, or simply the word content of a site, used typically to describe the content of web sites.<br /><br />In Maian Recipe, cloud tags are created from recipe ingredient and cooking instruction keywords and provide additional links for search engines.<br /><br />For more on Cloud Tags, see the docs.';
$javascript66    = 'Please complete all fields..';
$javascript67    = 'Invalid e-mail address..try again..';
$javascript69    = 'Incorrect spam prevention code...please try again..';
$javascript70    = 'Comment Added - Please close this box and refresh page.';
$javascript71    = 'Comment Added - Your comment has been queued for approval and will be reviewed shortly.';
$javascript72    = 'Check the "Remember Me" box to stay logged in for 30 days. Note, this is <b>NOT</b> recommended for shared computers and cookies must be enabled!';
$javascript73    = 'This feature is not currently enabled..check back later..';


//-----------------------------------------------------------------------------
// IMPORTANT! DO NOT remove this link unless you have had permission to do so
// Thank you!
//-----------------------------------------------------------------------------


$footerlink      = 'Powered by <a href="http://www.maianrecipe.com/" onclick="window.open(this);return false" title="'.$script.' '.$script2.'"><b>'.$script.' '.$script2.'</b></a><br />&copy; 2006-'.date("Y").' Maian Script World. All Rights Reserved.';

?>
