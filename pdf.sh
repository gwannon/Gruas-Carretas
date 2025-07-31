#!/bin/bash

php ./tools/generateOrdenanzas.php > ./metas.txt
chromium --no-sandbox --headless --gpu --no-pdf-header-footer --print-to-pdf=./temp.pdf ./OrdenanzaMunicipalSobreCarrosYMonturas.html
pdftk 'temp.pdf' update_info_utf8 'metas.txt' output 'Gruas-y-carretas-Ordenanzas.pdf'
rm temp.pdf
rm metas.txt
#rm OrdenanzaMunicipalSobreCarrosYMonturas.html

php ./tools/generateGuia.php > ./metas.txt
chromium --no-sandbox --headless --gpu --no-pdf-header-footer --print-to-pdf=./temp.pdf ./GuiaInternaDeCobroDeMultas.html
pdftk 'temp.pdf' update_info_utf8 'metas.txt' output 'Gruas-y-carretas-Guía.pdf'
rm temp.pdf
rm metas.txt
#rm GuiaInternaDeCobroDeMultas.html

php ./tools/generateAventuras.php > ./metas.txt
chromium --no-sandbox --headless --gpu --no-pdf-header-footer --print-to-pdf=./temp.pdf ./HistoriasTrasUnasCervezas.html
pdftk 'temp.pdf' update_info_utf8 'metas.txt' output 'Gruas-y-carretas-Aventuras.pdf'
rm temp.pdf
rm metas.txt
#rm HistoriasTrasUnasCervezas.html
