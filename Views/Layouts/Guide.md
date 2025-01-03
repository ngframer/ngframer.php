# Guide on Using Layouts

Layout is a type of view that acts as a container for other views. It allows you to define a common structure for your application.
Layout can simply be even said as the template for your application.
  
  
## Use-case for Layouts
1. Define a common structure for your application.
2. To make a template that will be repeated in all the pages for your application.  
   Example: Header, Footer, Navigation bar, Analytics Code, etc.

## When not to use Layouts?
1. Don't use layout to build content-based views.
2. Don't even use the layouts for static contents.

If you're thinking of building a view,
you should use the response->render->page() method instead of just rendering the layout.
To not be confused, the mentioned method also requires the layout to be passed as an argument.
Have no layout, create a new "layoutName.php" file and use "layoutName" as the layout.
