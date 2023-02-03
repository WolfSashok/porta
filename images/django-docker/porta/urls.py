from django.urls import path
from .import views

urlpatterns = [
#    path('', views.index, name ='index'), #eg: /porta/

    path('', views.alg, name='alg'),

]