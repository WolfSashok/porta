#!/bin/bash

text=$1

echo "
<center>OK! Let's check it:)<br>
You have written this text:<br>
============================================<br>
\"$text\"<br>
============================================<br><br>"

if [ "$text" != "" ]; then

#Cut the text to the words and dump it to array.
IFS=' ' read -r -a array <<< $text


#Work with array. Use every symbol in a word and grep. Write the required to tmp file

    for word in ${array[@]}; do
        long=$(wc -m <<< $word) #How symbols in the word
        i=0
        while [ $i -lt $long ]; do # Find symbol in a word
            symbol=${word:$i:1}
            ((i=i+1))
            if [ `echo $word | grep -o "$symbol" | wc -l` -eq 1 ]; then # If the symbol is uniq, write to array and break while
#                echo $symbol 
                UnicTextSymbols+=("${symbol[0]}")
                i=$long
            fi
        done
    done

# Find the first uniq symbol and print the result.

    for i in ${UnicTextSymbols[@]}; do
        if [ `echo ${UnicTextSymbols[@]} | grep -o $i | wc -l` -eq 1 ]; then
            echo "
            <font size=5 color=00FF00>!!!!!!!!!CONGRATULATION!!!!!!!!!<br><br>
            The symbol is <b>\"$i\"</b></font><br><br>"
            exit 0
        fi

    done

    echo "
    <center><font size=5 color=FF0000>O-O-O-p-s-s-s. There isn't such letter!<br>
    Please try againg.</font><br>"

else 
    echo "<center>Sorry, You should input some text.<br><br>"
fi
