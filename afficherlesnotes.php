<?php

class Etudiant {
    public $nom;
    public $prenom;
    public $notes = [];

    public function __construct($nom, $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function ajouterNote($matiere, $note) {
        $this->notes[$matiere] = $note;
    }
}

class Professeur {
    public function attribuerNote(Etudiant $etudiant, $matiere, $note) {
        $etudiant->ajouterNote($matiere, $note);
    }
}

class ParentEtudiant {
    public $nom;
    public $enfants = [];

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function ajouterEnfant(Etudiant $etudiant) {
        $this->enfants[] = $etudiant;
    }

    public function afficherTableauNotes() {
        echo "Tableau des notes pour les enfants de $this->nom :\n";
        foreach ($this->enfants as $etudiant) {
            echo " - {$etudiant->prenom} {$etudiant->nom} :\n";
            foreach ($etudiant->notes as $matiere => $note) {
                echo "    $matiere : $note\n";
            }
            echo "\n";
        }
    }
}

// Exemple d'utilisation
$parent1 = new ParentEtudiant("Parent1");

$etudiant1 = new Etudiant("Nom1", "Prenom1");
$etudiant2 = new Etudiant("Nom2", "Prenom2");

$professeur = new Professeur();
$professeur->attribuerNote($etudiant1, "Mathématiques", 18);
$professeur->attribuerNote($etudiant2, "Mathématiques", 15);

$parent1->ajouterEnfant($etudiant1);
$parent1->ajouterEnfant($etudiant2);

$parent1->afficherTableauNotes();
