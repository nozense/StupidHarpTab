# StupidHarpTab

Just a stupid (i.e not sane, beautiful or efficient) parser for simple tab files using a sligthly alterd tab format.

## Purpose

To be able to add note length to tabs without making them harder to read,
but be able to draw these out with easily understandable characters.
Parsed with php and css to make it easy, lightweight and customizable.

## Disclaimer

I know very little code, i'm not in any way capable of writing this code.
I made it for my self and leave it here for those who migth want to use it or alter it to something better.
Do not trust the code, if you are not capable of understanding the code you are adviced not to use it.

## Limitations (or TODO)

* I TAKE NO RESPONSIBILITY FOR THIS CODE OR ANY USE OF IT
* No escaping or sanitation of input AT ALL
* No expressions - like strength, thrill, slide etc.
* Due to DIV behaviour, line length is locked at 40em - meaning no more than 20 tab signs per line. (you can easily change this.)

## Usage

StupidHarpTab(FILE, STYLE);

FILE is the file with one or more tabs
STYLE is "div" for a div/border based parsing and "unicode" to use unicode symbols.


## Tab/file syntax

Explanation | Notation
 ------------ | -------------
Four Blow | 4
Four Draw | (4)
Sixteeth note (preceding :) | :4
Eighth note (preceding .)| .4
Quater note (no marking) | 4
Half note (trailing .)| 4.
Full note (trailing :)| 4:
Eighth note Rest (lower case r) | r
Quater note Rest (upper case R) | R
Repeat - Start (upper case D) | D
Repeat - End (lower case d) | d
Header/Title (# as first char) | # Title


## Files

* StupidHarpTab.php - Main functions
* StupidHarpTab.css - Needed css for musical Notation
* scarborough.txt - Example tab file
* test.php - Test and demo
