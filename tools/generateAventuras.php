<?php

require __DIR__ . '/../vendor/autoload.php';

$tags = [
  'HTML' => '',
  'HASH' => date("YmdHis"),
  'TITLE' => "Grúas&Carretas: Historias tras unas cervezas",
  'DESCRIPTION' => 'En este suplemento tienes aventuras que podrás en tu abrevadero favorito tomando unas buenas cervezas. ',
  'VERSION' => "1.0",
  'AUTHOR' => "@Gwannon",
  'AUTHORURL' => "https://gwannon.itch.io/",
  'BGCOLOR1' => "#359138",
  'BGCOLOR2' => "#18b91d",
  'BGCOLOR3' => "#0f6d13",
  'BORDERCOLOR' => "#4caf50",
  'BG' => "#d3ffe1",
  'BGINSIDE' => "#afffc7",
  'URLWEB' => 'https://gruascarretas.gwannon.com/HistoriasTrasUnasCervezas.html',
  'URLACC' => 'https://gruascarretas.gwannon.com/AccHistoriasTrasUnasCervezas.md',
  'URLPDF' => 'https://gruascarretas.gwannon.com/pdf/?lang=aventuras',
];

//Generamos el HTML
use FastVolt\Helper\Markdown;

file_put_contents(__DIR__ . "/../AccHistoriasTrasUnasCervezas.md", str_replace(["\sp", "\sc", "\sinc", "\conc", "&nbsp;\n", "\n\n\n"], "", file_get_contents(__DIR__ . "/../Historias tras unas cervezas.md")));

$mkd = Markdown::new();
$mkd->setContent(file_get_contents(__DIR__ . "/../Historias tras unas cervezas.md"));
$tags['HTML'] = $mkd->toHtml();
$html = file_get_contents(__DIR__ . "/template.html");
foreach ($tags as $tag => $value) {
  $html = str_replace("|".$tag."|", $value, $html); 
}

$html = str_replace("<p>\salto</p>", "</div><div>", $html);


file_put_contents(__DIR__ . "/../HistoriasTrasUnasCervezas.html", $html);

echo "InfoKey: Subject\n";
echo "InfoValue: ".$tags['DESCRIPTION']." Versión ".$tags['VERSION']."\n\n";
echo "InfoKey: Author\n";
echo "InfoValue: ".$tags['AUTHOR']."\n\n";
