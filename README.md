# StupidHarpTab

Just a stupid (i.e not sane, beautiful or efficient) parser for simple tab files using a sligthly alterd tab format.

## Purpose

To be able to add note length to tabs without making them harder to read,
but be able to draw these out with easily understandable characters.
Parsed with php and css to make it easy, lightweight and customizable.

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
Header/Title (# as first char) | # Title



## Files

* StupidHarpTab.php - Main functions
* StupidHarpTab.css - Needed css for musical Notation
* scarburogh.txt - Example tab file
* test.php - Test and demo
