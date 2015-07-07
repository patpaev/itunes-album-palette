# iTunes Album Palette 

I loved the idea that Apple introduced in iTunes 11 of creating dynamic colour palettes for individual album views dependent on the album art. 

![iTunes Screenshot](http://patpaev.github.io/img/itunes.jpg)

This technique could be used to enhance design and UX, providing automatic theming, in a number of circumstances on the web if executed well. 

While mine is by no means a comprehensive approach, it provides a proof of concept for the idea. 

## Usage 

Start up a web server, put some of your own images in the `/img` folder and voíla! 

I've placed a selection of (royalty free) images in there thanks to the kind folks at [Unsplash](https://unsplash.com/), [The Pattery Library](http://thepatternlibrary.com) and [Gratisography](http://www.gratisography.com/)! 

I've tried to sample images where the technique I've used does and doesn't work to demonstrate the merits and limitations of this approach. 

The interface looks something like this:

![Usage Screenshot](http://patpaev.github.io/img/usage-screen-shot.jpg)

## Future

While I don't intend to perfect this, further improvements for a more complete solution would be:

* Analysis of _more_ pixels in detail to determine which colour is actually the most dominant, instead of heavily approximating
* Ensuring there's enough contrast between the background colour and the text color 
* Reduce the amount of browns that the algorithm returns 
* Return a secordary color
* Don't let it return negative RGB values
* Allow uploads
* Clear the cache of palette files 
* Refactoring the code, because I wrote it a couple of years ago and it's messy. 

## Disclaimer 

Creative Commons License, no affiliations with Apple or iTunes. Feel free to use / modify / add / contribute :) 