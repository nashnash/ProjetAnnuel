#include <stdlib.h>
#include <gtk/gtk.h>

int main(int argc, char **argv)
{
    GtkWidget *pWindow;
    GtkWidget *pTable;
    GtkWidget *pButton[4];
    GtkWidget* gtk_frame_new(const gchar *label);

    gtk_init(&argc, &argv);

    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_default_size(GTK_WINDOW(pWindow), 900, 400);
    gtk_window_set_title(GTK_WINDOW(pWindow), "WeatherStation");
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(gtk_main_quit), NULL);
    void gtk_frame_set_label(GtkFrame *frame, const gchar *label);
    G_CONST_RETURN gchar* gtk_frame_get_label(GtkFrame *frame);
GtkShadowType gtk_frame_get_shadow_type(GtkFrame *frame);
GtkWidget* gtk_hseparator_new(void);
GtkWidget* gtk_vseparator_new(void);

    /* Creation et insertion de la table 3 lignes 2 colonnes */
    pTable=gtk_table_new(2,2,TRUE);
    gtk_container_add(GTK_CONTAINER(pWindow), GTK_WIDGET(pTable));

    /* Creation des boutons */
    pButton[0]= gtk_button_new_with_label("Heure");
    pButton[1]= gtk_button_new_with_label("Temp");


    /* Insertion des boutons */
    gtk_table_attach_defaults(GTK_TABLE(pTable), pButton[0],
        0, 1, 0, 1);
            gtk_table_attach_defaults(GTK_TABLE(pTable), pButton[1],
        1, 2, 0, 1);


    gtk_widget_show_all(pWindow);

    gtk_main();

    return EXIT_SUCCESS;
}
