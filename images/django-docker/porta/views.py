from django.shortcuts import render
from django.http import HttpResponse



def alg(request, *args, **kwargs):
#    return HttpResponse("ALG")
    return render(request, 'alg/algorithm.html', {})


