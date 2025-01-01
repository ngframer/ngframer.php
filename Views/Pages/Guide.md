# Guide on Using Pages

The page is a type of view that is used to display static content. 
It is a good way to display information that does not change often, such as an "About Us" page or a "Contact Us" page.

In this guide, we will explain to you when to create pages based view in your application.

1. Use this if you have static content to display.
2. Use this if you have a section that won't be repeated. Meaning, if you have a page with 2 CTA section, don't use page, rather construct the page using the ```response->render()->page->build('layoutName', ['param' => 'value'])``` method.

If you are confused on what to use, consider the default to the method mentioned in the 2. Method 2 makes the code reusable and is more maintainable.
