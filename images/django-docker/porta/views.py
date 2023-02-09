from django.shortcuts import render
from django.http import HttpResponse



#def alg(request, *args, **kwargs):
#    text = request
#    return HttpResponse("ALG")
#    return render(request, 'alg/algorithm.html', {})

def index(request):
    return render(request, 'index.html')

def alg(request):
    if request.method == 'POST':
        text = request.POST                                         # Get text from POST request and put into array

        symbols = []
        for word in text:                                              # Work with array and find uniq symbol
            for s in text[word]:
                if text[word].count(s) == 1:
                    symbols.append(s)
                    break
        for symbol in symbols:
            if symbols.count(symbol) == 1:
                break
        return HttpResponse(symbol)
    return HttpResponse("There isn`t POST request")


