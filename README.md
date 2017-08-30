# Imagazine
A multi purpose Wordpress theme (in development, beta release not planned yet)
At the moment only the most basic needed css styling for element positioning with customizer- and meta-options. A perfect 'blank' setup for custom theme development.

### Features:

    * ready for pagebuilder plugins
  	* adjustments through customizer
    * upperbar with a navigation menu (option to stick to top)
    * topbar with a navigation menu & logo combined + 2 sidebars (option to stick to top)
	* header image and/or featured image header incl. 2 sidebars
	* content with before and after widgets + 2 sidebars
	* footer with a widgetcolumns-row, above or below + a navigation menu + 2 sidebars
	
	+ Widget for Post list  incl. 
		* category select or current post tag/cat related filter
		* thumbnail 
		* date/author setting
		* excerpt length setting
	
	+ Theme Commit Updates from Github 


### Customizer options

* global:

  * Identity
    * Title (wp default)
    * Tagline (wp default)
    * Logo(wp default)
    * (Fav)icon (wp default)

  * Background-image (default)

 * Screen modes
 	* small screen width
	* small screen outermargin
	* medium screen min switch
    * medium screen width
    * medium screen outermargin 
    * large screen min switch
    * large screen width
    * large screen outermargin
 
* Upperbar
  	* Behavior 
		* small screen hidden/relative/sticky (onscroll)
  		* large screen hidden/relative/sticky (onscroll)
  		* width outermargin
  	* Menu
		* small screen 
  		* large screen
  	* Sidebar
		* position
		* width percentage
		* content alignment
		* responsive position
		
* topbar:
   
  	* Behavior 
		* small screen hidden/relative/sticky (onscroll)
  		* large screen hidden/relative/sticky (onscroll)
    	* min-height
    	* outermarginmargin/fullwidth

  	* logo
    	* image
    	* min size
		* max size
    	* left/right/menucenter/centerabove

	* menu
    	* smallscreen open/collapsed
    	* largescreen left/right/center/collapsed
    	* text-alignment left/right
    

  	* topwidgets
    	* position menucolumntop/topbarwidth
    	* max columns
  
  	* topsidebars
		* sidebar1 position left/right
		* sidebar1 width
		* sidebar1 text-alignment left/right
		* sidebar1 responsive position 		before/after/collapse/hide
		* sidebar2 position left/right
		* sidebar2 width
		* sidebar2 text-alignment left/right
		* sidebar2 responsive position before/after/collapse/hide
		
 * Header
 	* header image
		* select or upload (wp default)
 	* header settings
		* type (imageonly/overlaycolumns/inside maincolumn)
		* title display (post/page)
		* use featured images yes/no
	  	* area width
		* inner content width
      	* height percentage
		* min-height in px
	  	* content alignment left/center/right
		
	* header sidebar 1
	  	* sidebar1 position left/right
		* sidebar1 width
		* sidebar1 text-alignment left/right
		* sidebar1 responsive position 		before/after/collapse/hide
		
	* header sidebar 2
	  	* sidebar2 position left/right
		* sidebar2 width
		* sidebar2 text-alignment left/right
		* sidebar2 responsive position before/after/collapse/hide
  	


* maincontent
	* Sidebars
		* sidebar1 position left/right
		* sidebar1 width
		* sidebar1 text-alignment left/right
		* sidebar1 responsive position 		before/after/collapse/hide
		* sidebar2 position left/right
		* sidebar2 width
		* sidebar2 text-alignment left/right
		* sidebar2 responsive position before/after/collapse/hide

* Footer
	* Behavior
		* width
		* Columns widgets
		* placement above/below/none
	* Sidebars
		* sidebar1 position left/right
		* sidebar1 width
		* sidebar1 text-alignment left/right
		* sidebar1 responsive position 		before/after/collapse/hide
		* sidebar2 position left/right
		* sidebar2 width
		* sidebar2 text-alignment left/right
		* sidebar2 responsive position before/after/collapse/hide


* Customizer default option;
	* Menu's
	* Widgets
	* Static frontpage
	* Extra css


### Following is in development
 
Customizer and meta options
page meta box
- [x] show/hide page top content widget
- [x] show/hide page main content
- [ ] show/hide date
- [ ] show/hide author
- [ ] date display type 
- [x] show/hide page bottom content widget

customizer global lists default settings
- [ ] show/hide top content widget
- [ ] show/hide date
- [ ] show/hide author
- [ ] date display type 
- [ ] show/hide bottom content widget

customizer global post default settings
- [ ] show/hide top content widget
- [ ] show/hide date
- [ ] show/hide author
- [ ] date display type 
- [ ] show/hide bottom content widget
- [ ] single post sidebars

customizer upperbar menu 
- [ ] menu alignment left/center/right
- [ ] submenu horizontal/vertical
- [ ] submenu compact .. /fullwidth/fullscreen

customizer topbar menu 
- [ ] menu alignment left/center/right
- [ ] submenu horizontal/vertical
- [ ] submenu compact .. /fullwidth/fullscreen

Theme Widgets
- [x] dashboard widget latest theme github commits 
- [x] post listing widget by category or related to current category/tags
- [ ] image/banner widget with link and subtitle options (extend core image widget?).

Theme Core Extensions
- [ ] menu images [in development]
- [ ] default filter selected categories
 
Theme css
add most basic css styling for all basic elements
- [ ]  upperbar menu and sidebar widgets
- [ ]  topbar  menu and sidebar widgets
- [ ]  header  columns, title and sidebar widgets
- [ ]  content top & bottom widgets, side menu, sidebar widgets
- [ ]  footer column widgets, menu and sidebar widgets
 
 
 
#### And further more
 
 * Theme Settings (options) page	
 	
 * Customizer options
 	* Add smart controls - http://divjot.co/blog/2015/03/23/smart-controls-wordpress-customizer/
	
 * upperbar
    * behavior 
	  	* display on scroll/none
	  	* responsive behavior
      
	
    	* sidebars
	  	* content alignment left/center/right
	  	* responsive placement above/after left/center/right
  
  	* Post Lists
		* list navigations
  		* search results
		* default category filter
		
  	* CSS markup for basic styling
	
		background-color
		font color
		link color
		hover link color
		margin vertical
		margin horizontal
		padding vertical
		padding horizontal

	* Admin Widgets
		
	* test with 
		* sliders/carroussels
		* agenda, calendarm etc.
		* video
