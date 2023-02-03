FROM python:3
# Устанавливает переменную окружения, которая гарантирует, что вывод из python будет отправлен прямо в терминал без предварительной буферизации
ENV PYTHONUNBUFFERED 1
# Устанавливает рабочий каталог контейнера — "app"
WORKDIR /app
# Запускает команду pip install для всех библиотек, перечисленных в requirements.txt
RUN pip install --upgrade pip
COPY ./requirements.txt .
RUN pip install -r requirements.txt
