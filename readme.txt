===  EAS EU compliance  ===
Contributors: eascompliance
Tags: EU VAT comliance solution, VAT return management, EU VAT fiscal reporting, full landed cost calculation, Customs duties calculation, HS6 code AI assigning 
Requires at least: 4.8.0
Requires PHP: 5.6
WC tested up to: 6.5.1
Tested up to: 6.0
Stable tag: 1.3.36
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


EAS solution automates the complicated EU VAT and customs compliance. With the full automation you can focus on the important - sales.
 
== Description ==

The end-to-end solution allows you to sell throughout the whole EU, whether you deliver from outside of EU or within. EAS automates the VAT compliance, from producing the intelligent full landed cost calculation to preparing the reporting ready for filing. We handle the VAT compliance, you don’t have to. 
If you are delivering from outside of EU, we collect and enhance the required customs data and provide the most secure data transfer to the destination authorities. The blockchain based solution conceals your trade secrets, automates GDPR and secures the IOSS number. With full data sets available on time your deliveries are seamless and fast and your customers are happy. We make sure your data is complete and secure 
In addition to handling the VAT and customs compliance, the solution is also capable to handle other obligatory EU reporting, such as the Intrastat on the sales EAS handles. 
Monthly costs per country you sell - no more! Sell anywhere in EU at a simple, low transaction based cost. In other words, if you don’t use it, there are no charges. 

= EAS EU compliance Features =

* Full landed cost calculator. Your customer always knows the whole amount due (including VAT and all applicable customs duties) on purchase.
* Registration for OSS/Import OSS special scheme with full fiscal representation.
* VAT return management due to order returns
* Compliance with all special schemes (Import, Union and Non-Union).
* Customs data collection and transfer for selected postal and courier operators including required data enrichment with HS6+ customs codes.
* Access to EAS Merchant dashboard that contains all invoices, reports and comprehensive shipping handling solution.
* All reporting including preparation of fiscal reports for all VAT special OSS scheme, available  free of charge in your Merchant dashboard.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins` directory and unzip, or install the plugin through the WordPress plugins screen directly.
2. Activate  EAS EU compliance plugin
3. Go to WooCommerce → Settings → EAS EU compliance tab
4. Input the following connection point for connection to EAS system API (item 1 above): https://manager.easproject.com/api. Sign up with EAS Project to obtain authorization key via the EAS self-registration system:  https://registration.easproject.com
5. If you already registered, then obtain authorization keys in Merchant Dashboard https://dashboard.easproject.com. If no please register at https://register.easproject.com
6. Set the language interface for the Plugin (EN for English is set by Default).
7. Tick the box "Enable EAS EU compliance" and press "Save changes" to test connection with API and create necessary EAS system attributes.
8. If wrong credentials provided Plugin won’t activate and an error message will be displayed.
9. Setup delivery option
10. Setup additional product attributes
11. Detailed instructions available at
 https://github.com/EAS-project-oy/eas-eu-compliance/blob/main/Installation%20and%20Setup%20guide%201.1.pdf

= Manual installation =

Follow instuctions from our github repo https://github.com/EAS-project-oy/eas-eu-compliance


== Changelog ==
= 1.3.36 =
* Code review and refactoring done
* minor bugs fixed in checkout step

= 1.3.33 =
* PayPal ans Avarda support implemented

= 1.3.31 =
* New method of checkout handling implemented
* WPML supporting improved
* Deduction of VAT from inclusive prices for the clients from non supported coutries implemented
* Refund amount calculation improved

= 1.3.10 =
* Multicurrency support enhanced
* Multilanguage support enhanced (WPML)
* Rounding issue in total cart fixed
* Taxes and Duties handling rules changed

= 1.3.5 =
* Implemented Required field in delivery address management

= 1.3.4 =
* Implemented handling of orders created manually in admin section or via API methods

= 1.3.3 =
* Suomi language updated
* English wordings improved

= 1.3.2 =
* Some bugs with differences in billing and shipping adresses fixed

= 1.3.0 =
* Gift cards support implemented
* Checkout process improved
* Refund and Cancelation improved
* Multi currency support implemented
* German language added

= 1.2.4 =
* SKU identification issue fixed
* Bug fixed with TBE management

= 1.2.0 =
* Refund functionality implemented
* Capons and points and rewards support implemented
* Some minor issues were fixed
* Rounding issue for total order amount fixed

= 1.1.3 =
* Multilingual support implemented
* Suomi translation added
* Delivery methods management enhanced
* Some minor bugs were fixed
* Fixed issue with custom theme support
* Implemented support of renaming buttons of plugin

= 1.0.5 =
* Code review according to Woocommerce standard requirements

= 1.0.0 =
* Initial release





