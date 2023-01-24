#!/bin/bash

text=$1

UniqTextSymbols=()

if [ "$text" != "" ]; then

echo "OK! Let's check it:)"

echo -e "You have writen this text:\n============================================\n\""$text"\"\n============================================\n"

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

#echo "${UnicTextSymbols[@]}"

    for i in ${UnicTextSymbols[@]}; do
        if [ `echo ${UnicTextSymbols[@]} | grep -o $i | wc -l` -eq 1 ]; then
            echo -e "Congratulation!!!!!!!!!\nThe symbol is \"$i\""
            break
        fi
    done

#echo "${UnicTextSymbols[@]}" | tr ' ' '\n' | sort -u | tr '\n' ' '
#UnicTextSymbols=($(echo "${UnicTextSymbols[@]}" | tr ' ' '\n' | sort -u | tr '\n' ' '))

#printf "%s\n" "${UnicTextSymbols[0]}"

#Find the 

else 
    echo "Usage \"You text format\" for input data"
fi