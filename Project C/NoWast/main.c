#include <stdlib.h>
#include <gtk/gtk.h>

#include <winsock2.h>
#include <MYSQL/mysql.h>
#include "connectSQL.h"
#include <curl/curl.h>
#include <stdio.h>


void on_activate_entry(GtkWidget *pEntry, gpointer data);
void on_copier_button(GtkWidget *pButton, gpointer data);

int main(int argc, char **argv)
{

MYSQL mysql;
        mysql_init(&mysql);
        mysql_options(&mysql,MYSQL_READ_DEFAULT_GROUP,"option");

    GtkWidget *pWindow;
    GtkWidget *pVBox;
    GtkWidget *pFrame;
    GtkWidget *pVBoxFrame;
GtkWidget *pButton;
    GtkWidget *pEntry;
    GtkWidget *pLabel;



    gchar *sUtf8;

    gtk_init(&argc, &argv);

    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* On ajoute un espace de 5 sur les bords de la fenetre */
    gtk_container_set_border_width(GTK_CONTAINER(pWindow), 5);
    gtk_window_set_title(GTK_WINDOW(pWindow), "GtkEntry");
    gtk_window_set_default_size(GTK_WINDOW(pWindow), 320, 200);
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(gtk_main_quit), NULL);

    pVBox = gtk_vbox_new(TRUE, 0);
    gtk_container_add(GTK_CONTAINER(pWindow), pVBox);

    /* Creation du premier GtkFrame */
    pFrame = gtk_frame_new("Identifiant");
    gtk_box_pack_start(GTK_BOX(pVBox), pFrame, TRUE, FALSE, 0);

    /* Creation et insertion d une boite pour le premier GtkFrame */
    pVBoxFrame = gtk_vbox_new(TRUE, 0);
    gtk_container_add(GTK_CONTAINER(pFrame), pVBoxFrame);



    /* Creation et insertion des elements contenus dans le premier GtkFrame */
    pLabel = gtk_label_new("Entrez votre nom d'utilisateur :");
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pLabel, TRUE, FALSE, 0);
    pEntry = gtk_entry_new();
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pEntry, TRUE, FALSE, 0);

    sUtf8 = g_locale_to_utf8("Entrez votre mot de passe :", -1, NULL, NULL, NULL);
    pLabel = gtk_label_new(sUtf8);
    g_free(sUtf8);
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pLabel, TRUE, FALSE, 0);
    pEntry = gtk_entry_new();
    gtk_box_pack_start(GTK_BOX(pVBoxFrame), pEntry, TRUE, FALSE, 0);

 pButton = gtk_button_new_with_label("Valider");
    gtk_box_pack_start(GTK_BOX(pVBox), pButton, TRUE, FALSE, 0);

     pLabel = gtk_label_new(NULL);
    gtk_box_pack_start(GTK_BOX(pVBox), pLabel, TRUE, FALSE, 0);


/* Connexion du signal "activate" du GtkEntry */
    g_signal_connect(G_OBJECT(pEntry), "activate", G_CALLBACK(on_activate_entry), (GtkWidget*) pLabel);


    /* Connexion du signal "clicked" du GtkButton */
    /* La donnee supplementaire est la GtkVBox pVBox */
    g_signal_connect(G_OBJECT(pButton), "clicked", G_CALLBACK(on_copier_button), (GtkWidget*) pVBox);


    gtk_widget_show_all(pWindow);

    gtk_main();

    return EXIT_SUCCESS;
}


/* Fonction callback execute lors du signal "activate" */
void on_activate_entry(GtkWidget *pEntry, gpointer data)
{
    const gchar *sText;

    /* Recuperation du texte contenu dans le GtkEntry */
    sText = gtk_entry_get_text(GTK_ENTRY(pEntry));

    /* Modification du texte contenu dans le GtkLabel */
    gtk_label_set_text(GTK_LABEL((GtkWidget*)data), sText);
    connectdb();
}

/* Fonction callback executee lors du signal "clicked" */
void on_copier_button(GtkWidget *pButton, gpointer data)
{

    connectdb();
}
