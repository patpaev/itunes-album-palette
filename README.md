# iTunes Album Palette 

I loved the idea introduced in iTunes 11 of creating dynamic colour palettes for individual album views dependent on the album art. 

### image 

This technique could be used to enhance design and UX in a number of circumstances on the web if executed well. 

While this is by no means a comprehensive approach, it provides a proof of concept for the idea. 

## Usage 

Start up a web server, put some images in the `/img` folder and voíla! 

## Future

While I don't intend to perfect this, further improvements for a more complete solution would be:

* Analysing _every_ pixel to determine which colour is actually the most dominant, instead of heavily approximating
* Ensuring there's enough contrast between the background colour and the text color 
* Reduce the amount of browns that the algorithm returns 
* Refactoring the code, because I wrote it a couple of years ago and it's messy. 
* Don't let it return negative RGB values...

## Disclaimer 

Creative commons license, no affiliations with Apple or iTunes. 