# VALIDAÇÃO DE NIF PORTUGUÊS (PHP PACKAGE)

O Projeto tens o objetivo de validar o NIF Português utilizando as regras descritas abaixo:

O NIF tem 9 dígitos, sendo o último o digito de controlo. Para ser calculado o digito de controlo:
    - Multiplique o 8.º dígito por 2, o 7.º dígito por 3, o 6.º dígito por 4, o 5.º dígito por 5, o 4.º dígito por 6, o 3.º dígito por 7, o 2.º dígito por 8 e o 1.º dígito por 9;
    - Some os resultados;
    - Calcule o resto da divisão do número por 11;
    - Se o resto for 0 (zero) ou 1 (um) o dígito de controlo será 0 (zero);
    - Se for outro qualquer algarismo X, o dígito de controlo será o resultado da subtracção 11 - X.

https://pt.wikipedia.org/wiki/N%C3%BAmero_de_identifica%C3%A7%C3%A3o_fiscal