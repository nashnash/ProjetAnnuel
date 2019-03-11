#include <stdio.h>
#include <gtk/gtk.h>
#include <openssl/ssl.h>
#include <curl/curl.h>

void on_activate_entry(GtkWidget *pEntry, gpointer data);
void on_copier_button(GtkWidget *pButton, gpointer data);


GtkWidget *Bar;

size_t my_write_func(void *ptr, size_t size, size_t nmemb, FILE *stream)
{
  return fwrite(ptr, size, nmemb, stream);
}

size_t my_read_func(void *ptr, size_t size, size_t nmemb, FILE *stream)
{
  return fread(ptr, size, nmemb, stream);
}

int my_progress_func(GtkWidget *bar,
                     double t, /* dltotal */
                     double d, /* dlnow */
                     double ultotal,
                     double ulnow)
{
/*  printf("%d / %d (%g %%)\n", d, t, d*100.0/t);*/
  gdk_threads_enter();
  gtk_progress_set_value(GTK_PROGRESS(bar), d*100.0/t);
  gdk_threads_leave();
  return 0;
}

void *my_thread(void *ptr)
{
  CURL *curl;
  CURLcode res;
  FILE *outfile;
  gchar *url = ptr;

  curl = curl_easy_init();
  if(curl) {
    const char *filename = "test.curl";
    outfile = fopen(filename, "wb");
     curl_easy_setopt(curl, CURLOPT_CAINFO, "/etc/ssl/certs/ca-certificates.crt");

    curl_easy_setopt(curl, CURLOPT_URL, url);
    curl_easy_setopt(curl, CURLOPT_WRITEDATA, outfile);
    curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, my_write_func);
    curl_easy_setopt(curl, CURLOPT_READFUNCTION, my_read_func);
    curl_easy_setopt(curl, CURLOPT_NOPROGRESS, 0L);
    curl_easy_setopt(curl, CURLOPT_PROGRESSFUNCTION, my_progress_func);
    curl_easy_setopt(curl, CURLOPT_PROGRESSDATA, Bar);

    res = curl_easy_perform(curl);

    fclose(outfile);
    /* always cleanup */
    curl_easy_cleanup(curl);
  }

  return NULL;
}

int main(int argc, char **argv)
{
  GtkWidget *Window;

  GtkWidget *pVBox;
    GtkWidget *pFrame;
    GtkWidget *pVBoxFrame;
GtkWidget *pButton;
    GtkWidget *pEntry;
    GtkWidget *pLabel;



  /* Must initialize libcurl before any threads are started */
  curl_global_init(CURL_GLOBAL_ALL);

  /* Init thread */
  g_thread_init(NULL);

  gtk_init(&argc, &argv);
  Window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* On ajoute un espace de 5 sur les bords de la fenetre */
    gtk_container_set_border_width(GTK_CONTAINER(Window), 5);
    gtk_window_set_title(GTK_WINDOW(Window), "GtkEntry");
    gtk_window_set_default_size(GTK_WINDOW(Window), 320, 200);


    g_signal_connect(G_OBJECT(Window), "destroy", G_CALLBACK(gtk_main_quit), NULL);

    pVBox = gtk_vbox_new(TRUE, 0);
    gtk_container_add(GTK_CONTAINER(Window), pVBox);

    /* Creation du premier GtkFrame */
    pFrame = gtk_frame_new("NoWaste");
    gtk_box_pack_start(GTK_BOX(pVBox), pFrame, TRUE, FALSE, 0);

    /* Creation et insertion d une boite pour le premier GtkFrame */
    pVBoxFrame = gtk_vbox_new(TRUE, 0);
    gtk_container_add(GTK_CONTAINER(pFrame), pVBoxFrame);



    /* Creation et insertion des elements contenus dans le premier GtkFrame */
    pLabel = gtk_label_new("Scanner le code barre de votre produit");
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pLabel, TRUE, FALSE, 0);
    pEntry = gtk_entry_new();
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pEntry, TRUE, FALSE, 0);


 pButton = gtk_button_new_with_label("VALIDER LA SAISIE");
    gtk_box_pack_start(GTK_BOX(pVBox), pButton, TRUE, FALSE, 0);

     pLabel = gtk_label_new(NULL);
    gtk_box_pack_start(GTK_BOX(pVBox), pLabel, TRUE, FALSE, 0);


/* Connexion du signal "activate" du GtkEntry */
    g_signal_connect(G_OBJECT(pEntry), "activate", G_CALLBACK(on_activate_entry), (GtkWidget*) pLabel);


    /* Connexion du signal "clicked" du GtkButton */
    /* La donnee supplementaire est la GtkVBox pVBox */
    g_signal_connect(G_OBJECT(pButton), "clicked", G_CALLBACK(on_copier_button), (GtkWidget*) pVBox);


  gtk_widget_show_all(Window);

  if(!g_thread_create(&my_thread, argv[1], FALSE, NULL) != 0)
    g_warning("can't create the thread");


  gdk_threads_enter();
  gtk_main();
  gdk_threads_leave();
  return 0;
}

/* Fonction callback execute lors du signal "activate" */
void on_activate_entry(GtkWidget *pEntry, gpointer data)
{
    const gchar *sText;
    const gchar *sText1;
    const gchar *sText2;

    sText1 = "https://fr.openfoodfacts.org/api/v0/produit/";
    sText2 = ".json";

    /* Recuperation du texte contenu dans le GtkEntry */
    sText = gtk_entry_get_text(GTK_ENTRY(pEntry));

    /* Modification du texte contenu dans le GtkLabel */

    gtk_label_set_text(GTK_LABEL((GtkWidget*)data), sText);

CURL *curl;
  CURLcode res;

  curl_global_init(CURL_GLOBAL_DEFAULT);

  curl = curl_easy_init();
  if(curl) {
    curl_easy_setopt(curl, CURLOPT_URL, "https://google.fr");

#ifdef SKIP_PEER_VERIFICATION
    /*
     * If you want to connect to a site who isn't using a certificate that is
     * signed by one of the certs in the CA bundle you have, you can skip the
     * verification of the server's certificate. This makes the connection
     * A LOT LESS SECURE.
     *
     * If you have a CA cert for the server stored someplace else than in the
     * default bundle, then the CURLOPT_CAPATH option might come handy for
     * you.
     */
    curl_easy_setopt(curl, CURLOPT_SSL_VERIFYPEER, 0L);
#endif

#ifdef SKIP_HOSTNAME_VERIFICATION
    /*
     * If the site you're connecting to uses a different host name that what
     * they have mentioned in their server certificate's commonName (or
     * subjectAltName) fields, libcurl will refuse to connect. You can skip
     * this check, but this will make the connection less secure.
     */
    curl_easy_setopt(curl, CURLOPT_SSL_VERIFYHOST, 0L);
#endif

    /* Perform the request, res will get the return code */
    res = curl_easy_perform(curl);
    /* Check for errors */
    if(res != CURLE_OK)
      fprintf(stderr, "curl_easy_perform() failed: %s\n",
              curl_easy_strerror(res));

    /* always cleanup */
    curl_easy_cleanup(curl);
  }

  curl_global_cleanup();

  return 0;

}

/* Fonction callback executee lors du signal "clicked" */
void on_copier_button(GtkWidget *pButton, gpointer data)
{


}
