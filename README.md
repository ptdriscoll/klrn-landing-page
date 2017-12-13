# KLRN landing page template

This is a landing page template for KLRN digital campaigns, built with PHP 5 and Bootstrap 3. 

So far it has one page, for KLRN Passport campaigns. The page is sliced into PHP from this front-end design: https://github.com/ptdriscoll/npm-workflow. 

Google Analytics UTM parameters are used to determine customizations for the hero's image and text, and the main headline. A cookie remembers the content parameters, and also passes the values through the conversion funnel.

### Live Passport page 

- http://pbs.klrn.org/passport/
- http://pbs.klrn.org/passport/?utm_source=facebook&utm_medium=cpc&utm_campaign=Passport-2017&utm_content=Victoria

### Adding a new Passport campaign

1. Follow steps at https://github.com/ptdriscoll/npm-workflow
2. Copy styles.css from https://github.com/ptdriscoll/npm-workflow and add to passport/assets/css/
3. Add custom labels and titles to the `$customContent` variable in includes/landing/customContent.php
4. Add campaign's image folder with images to landing/passport/assets/
5. Make sure the campaign name in the UTM parameters has "Passport" in it, for example: utm_campaign=Passport-2017

### Adding content to an existing campaign

1. Follow first three steps in "Adding a new Passport campaign"
2. Add new hero images to campaign's unique folder in landing/passport/assets/

### References

- http://php.net/
- https://getbootstrap.com/
- https://github.com/ptdriscoll/npm-workflow
- https://support.google.com/analytics/answer/1033863?hl=en