<template>
    <div style="padding: 50px; padding-top: 8%">

        <v-data-table :headers="headers" :items="responsables" sort-by="item.id_responsable" class="elevation-1"
            :search="search" :loading="loading">
            <template v-slot:top>
                <v-toolbar flat>
                    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                        hide-details></v-text-field>
                    <v-spacer></v-spacer>

                    <v-dialog v-model="dialog" max-width="700px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="#002f6c" class="mb-2 btn white--text" v-bind="attrs" v-on="on">
                                <v-icon left>mdi-account-multiple-plus</v-icon>
                                Add
                            </v-btn>
                        </template>
                        <!-- Ajoutez le formulaire d'ajout de responsable ici -->
                    </v-dialog>

                    <!-- Ajoutez les boîtes de dialogue pour la modification et la suppression ici -->

                </v-toolbar>
            </template>

            <!-- Ajoutez les colonnes spécifiées pour les responsables ici -->

             <template v-slot:[`item.actions`]="{ item }">
                    <v-btn color="primary" class="mr-2 white--text" @click="editItem(item)">
                        <v-icon medium class="mr-2"> mdi-pencil </v-icon>
                    </v-btn>
                    <v-btn color="#f45" class="mr-2 white--text" @click="deleteItem(item)">
                        <v-icon medium @click="deleteItem(item)"> mdi-delete </v-icon>
                    </v-btn>
                </template>

            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize()">Reset</v-btn>
            </template>
        </v-data-table>
        <LoadingPage v-if="LoadingPage == true" />
    </div>
</template>

<script>


export default {
    name: "GestionUsers",
     components: {
    },

    data() {
        return {
            dialog: false,
            LoadingPage: false,
            search: "",
            loading: "false",
            editedIndex: -1,
            headers: [
                { text: "Username", value: "username", align: "start", sortable: true },
                { text: "Nom", value: "nom", sortable: true },
                { text: "Prenom", value: "prenom", sortable: true },
                { text: "Contact", value: "contact", sortable: true },
                // Ajoutez d'autres colonnes si nécessaire
                { text: "Actions", value: "actions", sortable: false },
            ],
            editedItem: {
                id_responsable: 0,
                username: "",
                password: "",
                nom: "",
                prenom: "",
                contact: "",
            },
            defaultItem: {
                id_responsable: 0,
                username: "",
                password: "",
                nom: "",
                prenom: "",
                contact: "",
            },
            responsables: [],
        };
    },
  
};
</script>

<style lang="scss" scoped></style>
