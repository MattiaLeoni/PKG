
# Mattia Leoni White Theme

Template semplice su cui costruire un sito wordpress.

Utilizzo di:
- UIkit
- sass
- twig
- composer


## Installing the Theme

"composer install" dalla directory principale.
NB: i seguenti plugin a pagamento e custom-made sono scaricabili dal mio github personale, se non avete l'accesso andranno comprati/scaricati e caricati manualmente:
- js_composer 
- polylang-pro
- redux-framework-white
- amz-vc-copy-paster-basic
- advanced-custom-fields-pro

Se si utilizza linux verranno spostati automaticamente nella cartella dei plugin
Se non viene utilizzato linux andranno poi spostati manualmente dalla cartella vendor/mleoni alla cartella /content/plugins


## Plugins

Plugin core:
- Timber: aggiunta di twig a templating di WP
- WpBakery/Visual Composer: builder per backend di WP con cui verranno costruite pagine e componenti di base
- Redux framework: utilizzato per creazione pagina opzioni
- ACF Pro: aggiunta campi personalizzati a post e custom post types
- Polylang pro: plugin di traduzione, ma molto utile anche per stringhe di testo customizzabili da inserire direttamente nel template

Plugin utili ma non fondamentali
- Disable gutenberg: per utilizzare l'editor classico e wpbakery
- Ninja Form: per form contatti
- amz-vc-copy-paster: per copiare e incollare blocchi di wpbakery
- custom post type ui: per creare nuovi post types senza passare dalle righe di codice

Altri plugin
- Duplicate post
- Yoast SEO
- Page loading effect
- Contact Form 7: per form contatti


## Funzionamento

La creazione di blocchi per wpbakery verrà inserita all'interno della cartella /templates
Ogni blocco avrà una cartella in cui sarà presente:
- file .component.php in cui sarà presente il mapping del componente da aggiungere a wpbakery
- file .template.twig che stamperà il componente
- file .style.scss per stile 

Sono stati impostato script per la creazione e rimozione dei componenti da lanciare dalla cartella principale del progetto: 

### Creazione nuovo componente:
Creerà il nuovo componente nella cartella /templates/components e implementerà gli includes nei file "/templates/components/include.php" e "/templates/components/_components.style.scss"

composer component:new component_slug component_name component_category

### Eliminazione componente:
Eliminerà la cartella del componente e rimuoverà le dipendenze dagli include

composer component:delete component_slug

