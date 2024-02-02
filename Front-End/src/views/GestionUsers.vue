
<template>
    <div style="padding: 50px; padding-top: 8%">
        <v-data-table :headers="headers" :items="responsables" sort-by="item.id_user" class="elevation-1" :search="search"
            :loading="loading">
            <template v-slot:top>
                <v-toolbar flat>
                    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                        hide-details></v-text-field>
                    <v-spacer></v-spacer>

                    <v-dialog v-model="dialog" max-width="700px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="#002f6c" class="mb-2 btn white--text" v-bind="attrs" v-on="on">
                                <v-icon left> mdi-account-multiple-plus </v-icon>
                                Add
                            </v-btn>
                        </template>
                        <v-card>
                            <v-toolbar color="#002f6c">
                                <v-btn icon dark @click="dialog = false">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title class="mb-2 btn white--text">ADD RESPONSABLE</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items> </v-toolbar-items>
                            </v-toolbar>
                            <v-card-title class="text-h5 grey--text text--darken-3">
                                Responsable Details:
                            </v-card-title>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.nom" label="Nom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.prenom" label="Prenom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.email" label="Email" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.etablissement" label="Etablissement"
                                                        outlined></v-text-field>
                                                </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn depressed color="" @click="dialog = false"> Close </v-btn>
                                <v-btn depressed color="#8eb5e8" @click="addResponsable()"> Save </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog v-model="dialogModifier" max-width="700px">
                        <v-card>
                            <v-toolbar dark color="#002f6c">
                                <v-btn icon dark @click="close(item)">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Edit Resposable</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items> </v-toolbar-items>
                            </v-toolbar>
                            <v-card-title class="text-h5 grey--text text--darken-3">
                                Responsable Details:
                            </v-card-title>
                            <v-container>
                                <v-row>
                                   <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.nom" label="Nom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.prenom" label="Prenom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.email" label="Email" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.etablissement" label="Etablissement"
                                                        outlined></v-text-field>
                                                </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn depressed color="" @click="dialogModifier = false"> Close </v-btn>
                                <v-btn depressed color="#8eb5e8" @click="editResponsable()"> Save </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog v-model="dialogConfirmationModifier" max-width="600px">
                        <v-card>
                            <v-toolbar dark color="error">
                                <v-btn icon dark @click="close(item)">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Warning ! </v-toolbar-title>
                                <v-card-title class="text-h5">Are you sure you want to Modifier this
                                    Responsable?</v-card-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items> </v-toolbar-items>
                            </v-toolbar>
                            <v-card-actions>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.nom" label="Nom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.prenom" label="Prenom" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.email" label="Email" outlined></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6">
                                                    <v-text-field v-model="editedItem.etablissement" label="Etablissement"
                                                        outlined></v-text-field>
                                                </v-col>
                                    </v-row>
                                </v-container>
                                <v-spacer></v-spacer>
                                <v-btn depressed color="" @click="dialogConfirmationModifier = false">Cancel</v-btn>
                                <v-btn depressed color="error" @click="editResponsable()">OK</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog v-model="dialogDelete" max-width="500px">
                        <v-card>
                            <v-toolbar dark color="error">
                                <v-toolbar-title>Warning !</v-toolbar-title>
                            </v-toolbar>
                            <v-card-title class="text-h5">Are you sure you want to delete this user?</v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn depressed color="" @click="closeDelete">Cancel</v-btn>
                                <v-btn depressed color="error" @click="deleteResponsableConfirm">OK</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:[`item.actions`]="{ item }">
                <v-btn color="#8eb5e8" class="mr-2 white--text" @click="editItem(item)">
                    <v-icon medium class="mr-2"> mdi-pencil </v-icon>
                </v-btn>
                <v-btn color="#f46" class="mr-2 white--text" @click="deleteItem(item)">
                    <v-icon medium @click="deleteItem(item)"> mdi-delete </v-icon>
                </v-btn>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize()"> Reset </v-btn>
            </template>
        </v-data-table>
        <LoadingPage v-if="LoadingPage == true" />
    </div>
</template>

<script>


export default {
    name: "GestionUsers",
    components: {},
    data() {
        return {
            dialog: false,
            LoadingPage: false,
            search: "",
            loading: "false",
            editedIndex: -1,
            dialogModifier: false,
            headers: [
                { text: "ID", value: "id_user", align: "start", sortable: true },
                { text: "Nom", value: "nom", sortable: true },
                { text: "Prénom", value: "prenom", sortable: true },
                { text: "Email", value: "email", sortable: true },
                { text: "Etablissement", value: "etablissement", sortable: true },
                { text: "Modifications", value: "actions", sortable: false },
            ],
            editedItem: {
                id_user: 0,
                nom: "",
                prenom: "",
                email: "",
                etablissement: "",
            },
            defaultItem: {
                id_user: 0,
                nom: "",
                prenom: "",
                email: "",
                etablissement: "",
            },
            responsables: [
                {
                    id_user: 1,
                    nom: "Nom 1",
                    prenom: "Prenom 1",
                    email: "email1@example.com",
                    etablissement: "Etablissement 1",
                },
                {
                    id_user: 2,
                    nom: "Nom 2",
                    prenom: "Prenom 2",
                    email: "email2@example.com",
                    etablissement: "Etablissement 2",
                },
            ],
        };
    },
    methods: {
        initialize() {
             this.getResponsables().then((data) => this.responsables = data);
        },
        editItem(item) {
            this.editedIndex = this.responsables.indexOf(item);
            this.editedItem = { ...item };
            this.dialogModifier = true;
        },
        save() {
            const index = this.responsables.findIndex(
                (responsable) => responsable.id_user === this.editedItem.id_user
            );

            if (index > -1) {
                this.editResponsable(index);
            } else {
                this.addResponsable();
            }
        },
        addResponsable() {
            console.log("Ajouter un responsable :", this.editedItem);
            this.responsables.push({ ...this.editedItem });
            this.editedItem = { ...this.defaultItem };
            this.dialog = false;
        },
        editResponsable(index) {
            console.log("Modifier un responsable :", this.editedItem);
            this.responsables[index] = { ...this.editedItem };
            this.editedItem = { ...this.defaultItem };
            this.dialogModifier = false;
        },
        close() {
            this.dialogModifier = false;
        },
    },
};

</script>

<style lang="scss" scoped></style>
