<?php

require __DIR__ . '/../vendor/autoload.php';

$tags = [
  'HTML' => '',
  'HASH' => date("YmdHis"),
  'TITLE' => "Grúas&Carretas: Ordenanza municipal sobre carros y monturas",
  'DESCRIPTION' => 'Grúas&Carretas (G&C) es un juego de rol para 4 personas donde eres une empleade del ayuntamiento de una ciudad de un RPG medieval fantástico que se encarga de llevarse carros, carretas y monturas indebidamente aparcadas.',
  'VERSION' => "1.1",
  'AUTHOR' => "@Gwannon",
  'AUTHORURL' => "https://gwannon.itch.io/",
  'BGCOLOR1' => "#6989ff",
  'BGCOLOR2' => "#3c66ff",
  'BGCOLOR3' => "#001976",
  'BORDERCOLOR' => "#30beff",
  'BG' => "#dcedff",
  'BGINSIDE' => "#dfe0ff",
  'URLWEB' => 'https://gruascarretas.gwannon.com/',
  'URLACC' => 'https://gruascarretas.gwannon.com/AccOrdenanzaMunicipalSobreCarrosYMonturas.md',
  'URLPDF' => 'https://gruascarretas.gwannon.com/pdf/',
];

//Generamos el HTML
use FastVolt\Helper\Markdown;

file_put_contents(__DIR__ . "/AccOrdenanzaMunicipalSobreCarrosYMonturas.md", str_replace(["\sp", "\sc", "\sinc", "\conc", "&nbsp;\n", "\n\n\n"], "", file_get_contents(__DIR__ . "/../Ordenanza municipal sobre carros y monturas.md")));

$mkd = Markdown::new();
$mkd->setContent(file_get_contents(__DIR__ . "/../Ordenanza municipal sobre carros y monturas.md"));
$tags['HTML'] = $mkd->toHtml();
$html = file_get_contents(__DIR__ . "/template.html");
foreach ($tags as $tag => $value) {
  $html = str_replace("|".$tag."|", $value, $html); 
}

$html = str_replace("<p>\salto</p>", "</div><div>", $html);


file_put_contents(__DIR__ . "/../OrdenanzaMunicipalSobreCarrosYMonturas.html", $html);

echo "InfoKey: Subject\n";
echo "InfoValue: ".$tags['DESCRIPTION']." Versión ".$tags['VERSION']."\n\n";
echo "InfoKey: Author\n";
echo "InfoValue: ".$tags['AUTHOR']."\n\n";
