 int gui (int argc,char **argv){
 GtkWidget *pWindow;
    gtk_init(&argc,&argv);

    /* Cr�ation de la fen�tre */
    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* D�finition de la position */
    gtk_window_set_position(GTK_WINDOW(pWindow), GTK_WIN_POS_CENTER);
    /* D�finition de la taille de la fen�tre */
    gtk_window_set_default_size(GTK_WINDOW(pWindow), 320, 200);
    /* Titre de la fen�tre */
    gtk_window_set_title(GTK_WINDOW(pWindow), "Chapitre I.");
    /* Connexion du signal "destroy" */
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(OnDestroy), NULL);
    /* Affichage de la fenetre */
    gtk_widget_show(pWindow);
    /* D�marrage de la boucle �v�nementielle */
    gtk_main();

    return EXIT_SUCCESS;
}

void OnDestroy(GtkWidget *pWidget, gpointer pData)
{
    /* Arr�t de la boucle �v�nementielle */
    gtk_main_quit();
}

