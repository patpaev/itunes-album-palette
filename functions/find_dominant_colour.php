<?php	
require_once('PHPImageWorkshop/ImageWorkshop.php'); 
use PHPImageWorkshop\ImageWorkshop; // Use the namespace of ImageWorkshop

function find_dominant_colour($orig){

	$imgFolder = "img/ImageWorkshop";
	
	// werk it 
	$werk = ImageWorkshop::initFromPath(__DIR__.'/..'.$orig);
	$werk->getHeight();
	$werk->getWidth();
	$werk->resizeInPixel(100, null, true);
	
	// blur it up a bit 
	for($i=0;$i<25;$i++){
		$werk->applyFilter(IMG_FILTER_GAUSSIAN_BLUR);
	}
	
	// pixelate the sh*t out of it
	$werk->applyFilter(IMG_FILTER_PIXELATE,20);
	$werk->resizeInPixel(10, 10, false);
	
	// Save the result
	$dirPath = __DIR__."/../".$imgFolder;
	$filename = "palette-".date("Ymd-His").".png";
	$createFolders = true;
	$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
	$imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
	$werk->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
	
	// some x-y points in the 10x10 image to grab a colour from 
	$imgPosition = array(
		array(0,0),
		array(2,3),
		array(4,5),
		array(8,9),
	);
	$palettes = array();
	
	// open the image 
	$im = imagecreatefrompng($dirPath."/".$filename);
	// extract colour values from each point 
	foreach($imgPosition as $position) {
		$rgb = imagecolorat($im, $position[0], $position[1]);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;	
		// add values to array of potential palettes 
		array_push($palettes, array($r,$g,$b));
	}
	
	$besti = -1; //index
	$bestv = (255*3); //value
	
	// choose closest colour to r+g+b=300 
	foreach($palettes as $i => $palette) {
		$sum = $palette[0]+$palette[1]+$palette[2];
		$v = (abs(300-$sum));
		if ($v < $bestv) {
			$bestv = $v;
			$besti = $i;
		}
	}
	
	//$rgb = $palettes[$besti];
	// if r+g+b > 600, use black text
	//$bestv>600 ? $white=0 : $white=1;
	
	class dominantColour
	{	
		public $palette;
		public function getPalette() {return $this->palette; }
		public function displayPalette() {echo($this->palette); }
		public function setPalette($set) {$this->palette = $set; }
				
		private $rbg;
		public function getRGB() {return $this->rgb;}
		public function setRGB($set) {$this->rgb = $set;}
		
		private $textColour = 'white';
		public function getTextColour() {return $this->textColour; }
		public function setTextColour($set) {$this->textColour = $set; }
		public function displayTextColour() {echo($this->textColour); }
		
		// arbitrary exaggeration value between tints...
		private $tintExaggeration = 22;
		public function setTintExaggeration($set) {$this->tintExaggeration = $set;}
		public function getTintExaggeration() {return $this->tintExaggeration;}
		
		private function calculateExaggeration($rgb,$diff,$direction) {
			$new = array();
			foreach($rgb as $colour) {
				array_push($new, $colour += ($diff * $direction));
			}
			return $new;
		}
		private function displayColour($colour) {
			echo("rgb(".$colour[0].",".$colour[1].",".$colour[2].")");
		}
		public function getLighter() {
			return ($this->calculateExaggeration($this->rgb,$this->tintExaggeration,1));
		}
		public function getDarker() {
			return $this->calculateExaggeration($this->rgb,$this->tintExaggeration,-1);
		}
		public function displayRGB() {
			$this->displayColour($this->rgb);
		}
		public function displayLighter() {
			$this->displayColour($this->getLighter());
		}
		public function displayDarker() {
			$this->displayColour($this->getDarker());
		}
	}
	$colourClass = new dominantColour();
	$colourClass->setRGB($palettes[$besti]);
	$colourClass->setTintExaggeration(22);
	$colourClass->setPalette($imgFolder."/".$filename);
	// if r+g+b > 600, use black text
	if ( ($colourClass->rgb[0] + $colourClass->rgb[1] + $colourClass->rgb[2]) > 600 ) {
		// color is too light to have enough contrast to see white text
		$colourClass->setTextColour('black');
	}

	return $colourClass;

}

?>