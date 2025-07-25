===  EAS EU compliance  ===

Contributors: easyaccesssystem
Tags: IOSS, OSS, EU VAT compliance, VAT calculator, IOSS registration
Requires at least: 4.8.0
Requires PHP: 5.6
WC tested up to: 10.0.2
Tested up to: 6.8.2
Stable Tag: 1.6.18
Last updated time: 20.07.2025
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EAS solution automates the complicated EU VAT and UK VAT compliance. With the comprehensive solution and full automation, you focus only on sales.
 
== Description ==

__Note!__ EAS Registration is required. Register at [https://easproject.com/reg](https://easproject.com/reg "Get credentials by registering to EAS project OY")

**IOSS, OSS, Non-Union OSS and UK VAT - EAS automates your EU & UK VAT and Customs compliance.** 

With EAS selling to all EU countries and UK is just as easy as your domestic sales, or even easier!

EAS removes all the tax and customs compliance barriers preventing your sales throughout the whole EU!

= EAS EU compliance Features =

* Smart VAT calculator: all 600.000+ reduced rates in use. Your customer knows the whole amount due (including VAT and all applicable customs duties) on purchase and you provide a better customer experience. 
* Registration for **OSS / IOSS special schemes** with intermediary services when needed
* VAT filing and payment management and support
* UK VAT compliance with intermediary services when needed
* Compliance with all schemes, Domestic, B2B, Import, Union and Non-Union schemes. EAS Solution supports all business models, including multi-warehouse. 
* Access to EAS Merchant dashboard that contains all invoices and reports
* Ready-for-filing reports, including preparation of fiscal reports for all VAT special schemes, available free of charge in your Merchant dashboard.
* All the data available in accountant friendly format, further reducing the need for manual work. 
* WooCommerce High-Performance Order Storage (HPOS) supported.
* Prohibition of ordering over the amount of threshold establisehd in EU for IOSS orders.
* EU Company VAT number online validation 


**How to get started?**

Getting started is easy!  EAS makes you EU and UK compliant within minutes.

1. Register at  [https://easproject.com/reg](https://easproject.com/reg "Get credentials by registering to EAS project OY") 
2. Install the EAS Plugin, or request free EAS installation assistance
3. If you decide to install the plugin your self, please follow setup instructions at the [EAS Help Center](https://help.easproject.com/eas-for-woocommerce "EAS Help Centre").

**EAS tool provides you with:**

*	Better customer experience for EU and UK consumers
*	The best full landed cost calculator on the market
*	Reduced VAT rates for better margins
*	IOSS registration without ﬁxed fees or minimum volumes
*	Fully automated EU-wide VAT reporting
*	HS6 codes assigning
*	Blockchain data security

**IOSS registration without registration, monthly fees or minimum volumes**

EAS all-inclusive IOSS service is volume based. The service includes IOSS registration, IOSS intermediary service, WooCommerce Plugin, IOSS reporting and IOSS ﬁling. EAS handles the complex, so you can focus on your customers.

**Introducing UK extension - fully automated UK sales**

With the new UK extension + EAS EU Compliance, you can cover more than half a billion consumers with one plugin. EAS makes UK sales easier than ever. The EAS plugin calculates UK VAT, creates VAT reports, ﬁles the reports, and invoices and pays the required VAT on your behalf. 

EAS UK VAT service pricing is volume based. 

**OSS and Non-Union OSS**

EAS tool supports all the EU VAT schemes. Meaning EAS supports warehousing products in multiple countries.


Everything is automated, and no manual use of the EAS tool is required. EAS OSS pricing is volume based while non-Union (digital goods) is a small % of the value

Start by installing the EAS compliance plugin and registering at [https://easproject.com](https://easproject.com/ "Get credentials by registering to EAS project OY"), or contact us via email or visit the EAS website and book a meeting.

**Transparent and clear pricing** 

EAS volume based fees are simple and transparent, you always know the charges.

Full pricing at [https://easproject.com](https://easproject.com/#pricing "Look at our pricing, it is clear and transparent")

Available in the following languages:

* Dutch
* English
* Finnish
* French
* German
* Italian
* Swedish
* Czech

The following currency switcher plugins are supported:

* WooCommerce Currency Switcher from WooCommerce Payments by Automattic
* WPML WooCommerce Multi-currency by OnTheGoSystems
* WC Currency Switcher by realmag777
* Multi Currency for WooCommerce by VillaTheme

Known incompatible plugins:
* WooCommerce Subscription by Automattic. 

== Installation ==

EAS project providing service for assistance installation.

1.	Register with EAS at [https://easproject.com](https://easproject.com "Get credentials by registering to EAS project OY") 
2. Install the plugin through the WordPress plugin directory
3. Activate  EAS EU compliance plugin through the 'Plugins' screen in WordPress.
4. Go to WooCommerce → EAS EU compliance tab
5. Input the following connection point for connection to EAS system API: https://manager.easproject.com/api.
6. If you already registered, then obtain authorization keys in Merchant Dashboard [https://dashboard.easproject.com](https://dashboard.easproject.com "Visit EAS Dashboard for your credentials"). If no please register at [https://easproject.com/](https://easproject.com/ "Get credentials by registering to EAS project OY")
7. Set the language interface for the Plugin (EN for English is set by Default).
8. Tick the box "Enable EAS EU compliance" and press "Save changes" to test connection with API and create necessary EAS system attributes.
9. If wrong credentials provided Plugin won’t activate and an error message will be displayed.
10. Setup delivery options
11. Setup additional product attributes
12. Detailed instructions available at [EAS Help Center](https://help.easproject.com/eas-for-woocommerce "Visit EAS Help Center for instructions and manuals.") or manual can be found in the plugin directory under the 'doc' folder.


== Screenshots ==

1. Only few configuation options to be set up on the main configuration screen.
2. EAS calculates EU taxes and uses reduced VAT rates.
3. No worries about OSS or IOSS reporting to authorities, everything is done by us. 

== Changelog ==

= 1.6.18 =

* Implemented partial support of the Blcoks checkout page. Starting from 1.6.18 EAS EU compliance supports Checkout Blocks for the Standard operatoinal mode with IOSS threshold calculation
* Fixed issue with duplicated items in the cart (some plugins create duplicated items that to be hanlde by EAS plugin as a separate item with unique ID)
* Fixed compatibility issue with WooCommerce Multilingual & Multicurrency in the Admin 
* Minor bugs fixed in the installation and removal process

= 1.6.11 =

* Tax lines representation changed in the order cnfirmation page for better understanding
* Fixed a bug that prevented to upload images in the admin dashaboard in some cases
* Added valiation of the store currency exchnage rates support by EU Central Bank. For non supported currencies IOSS threshold calculation will be skipped
* Additional validations added for the Company EU VAT numbers, including user interface improvements
* Fixed issue with EU IOSS threshold calculation. In some cases this was applied for non EU countries
* Fixed issue with calcualting final Shipping price
* Minor bugs fixed




= 1.6.2 =

* Fixed issue with EU VAT validation component on the checkout.
* Fixed a bug that prevented refund/return confirmation.
* Added additional details to the logs for better traceability.


= 1.6.0 =

* Processing of the checkout token enhacened. For some stores this will increase productivity.
* Handling of the taxes refactored. In case when order contains only taxes, they will be stored in the order with relevant tax class. Accounting software will be able to get proper VAT rates per items. Affected new orders only.
* Totaly refactored Standard mode. Plugin fully supports IOSS threshold computation following EU regulations without calling EAS solution backend. 
* Order VAT scheme column added to the order list. Helps to separate IOSS orders from others. Affected new orders only.
* Minor changes to the delivery address handling implemented. In some stores Delivery Sate/Province data not properly handled during checkout process.  
* Minor changes to the Admin section implemented.

= 1.5.35 =

* Implemented support of ambiguous currency conversion behaviour in some combinations of configuration options.

= 1.5.30 =

* New feature added, "Freeze Prices," which enables the sale of products across all EU countries at a uniform price, inclusive of taxes
* Refunds processing logic changed. Notification messages rephrased for better undestanding
* Minor changes to the paid orders and shipping infromation processing logic done 
* Minor changes to the translations done 

= 1.5.24 =

* Compatibility issue with latest WooPayments fixed. New option in the plugin settings implemented "Load payments methods from server before taxes were calculated". The option should be enabled only if WooPayments compatibility issue identfied. When calculations are finished, payment methods do not display input forms to enter credit card information. 

= 1.5.23 = 

* Some plugins changing product description on the fly, that caused unnecessary calculations in EAS plugin.  Additional validations added to prevent this.

= 1.5.21 = 

* The EU company VAT validation feature can be disabled in the settings.
* The EU company VAT validation feature will not be used if the Company Name field is hidden in the WooCommerce Checkout settings.
* Administrators can translate the price breakdown information.
* Minor bugs with popup windows have been fixed.
* Minor style updates have been implemented.
* Log details have been enhanced.
* The issue with duplicated items in the order has been fixed.
* Detailed information about why an order needs to be recalculated has been added.

= 1.5.7 =
* New freature implemented. EU Company VAT number validation added on the checkout page. 

= 1.5.4 =
* Integrated into the admin order view visualization for B2B customers' VAT numbers gathered during the checkout process.
* Resolved an issue related to the display of the checkout page within the editor.
* Incorporated validation for the usage of WordPress blocks on the checkout page.

= 1.5.1 =
* Small update in the Tax rates updating logic


= 1.5.0 =
* Implemented support for Woo Gift Cards within WooCommerce, enhancing the plugins's capability for gift card handling.
* Developed a feature ensuring the checkout page reloads after landed cost calculation, addressing compatibility issues with certain store themes that were not displaying payment methods correctly. 
* Rectified the problem related to URL encoding/decoding of checkout data, resolving inconsistencies caused by plugins encoding checkout form data improperly.
* Introduced an automated update feature for VAT (Value Added Tax) rates, enhancing the system's ability to dynamically manage tax rate changes.
* Resolved an issue where Tax columns were duplicating on the Order admin view page, ensuring a streamlined and accurate view for administrators.
* Conducted miscellaneous enhancements and bug fixes to improve the user experience and streamline functionalities within the EAS EU Compliance plugin.

= 1.4.92 =
* Validation of EU VAT ID for B2B sales added. Validation implemented in a separate popup window. 

= 1.4.89 =
* Bug fixed when after landed cost calculated, WooCommerce returns delivery options for store registration country.
* Additional validation added for B2B sales

= 1.4.87 =
* Removed unnecessary checkout page reload. 
* Refactored plugin behaviour on the checkout steps
* Support of WooCommerce Multilingual and Multicurrency plugin refactored
* Fixed issue with 150€ threshold computation.
* New feature implemented. Now it is possible to send orders to EAS solution directly from admin order page.
* Some minor updates implemented.
