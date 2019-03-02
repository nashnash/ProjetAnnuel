 int gui (int argc,char **argv){
 GtkWidget *pWindow;
    gtk_init(&argc,&argv);

    /* Création de la fenêtre */
    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* Définition de la position */
    gtk_window_set_position(GTK_WINDOW(pWindow), GTK_WIN_POS_CENTER);
    /* Définition de la taille de la fenêtre */
    gtk_window_set_default_size(GTK_WINDOW(pWindow), 320, 200);
    /* Titre de la fenêtre */
    gtk_window_set_title(GTK_WINDOW(pWindow), "Chapitre I.");
    /* Connexion du signal "destroy" */
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(OnDestroy), NULL);
    /* Affichage de la fenetre */
    gtk_widget_show(pWindow);
    /* Démarrage de la boucle événementielle */
    gtk_main();

    return EXIT_SUCCESS;
}

void OnDestroy(GtkWidget *pWidget, gpointer pData)
{
    /* Arrêt de la boucle événementielle */
    gtk_main_quit();
}

