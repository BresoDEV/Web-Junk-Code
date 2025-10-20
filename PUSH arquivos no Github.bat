@echo off
cd /d "%~dp0"

:: Mensagem de commit automática com data e hora
set COMMIT_MSG=Commit automatico em %date% às %time%

echo Adicionando todos os arquivos modificados...
git add .

echo Fazendo commit com a mensagem: %COMMIT_MSG%
git commit -m "%COMMIT_MSG%"

echo Enviando para o repositorio remoto...
git push

echo Operacao concluida.
pause


