<?php

namespace PMM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\CommandeMedicament;

/**
 * Print controller.
 *
 */
class PrintController extends Controller
{
 
    public function commandeAction($id, Request $request){
        
        $commande = $this->getDoctrine()->getManager()->getRepository('PMMCoreBundle:Commande')->find($id);
        
        $pdf = new \FPDF();
        $pdf->AddPage();
        
        //************************
        //ENTETE
        //***********************
        $pdf->SetXY( 15, 10 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "MINISTERE DE LA SANTE PUBLIQUE", 0, 0, 'C');
        $pdf->SetXY( 15, 15 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "DELEGATION REGIONALE DU LITTORAL", 0, 0, 'C');
        $pdf->SetXY( 15, 20 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "DISTRICT DE SANTE DE MANJO", 0, 0, 'C');
        $pdf->SetXY( 15, 25 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 50, 8, "HOPITAL DE DISTRICT DE MANJO", 0, 0, 'C');
        $pdf->SetXY( 15, 30 ); $pdf->SetFont('Arial','',8); $pdf->Cell( 50, 8, "B.P: 05 Manjo  Tel: 243 25 98 00", 0, 0, 'C');
        $pdf->SetXY( 15, 33 ); $pdf->SetFont('Arial','',8); $pdf->Cell( 50, 8, "E-mail: hdmanjo@gmail.com", 0, 0, 'C');
        
        $pdf->SetXY( 145, 10 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "REPUBLIQUE DU CAMEROUN", 0, 0, 'C');
        $pdf->SetXY( 145, 15 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "PAIX - TRAVAIL - PATRIE", 0, 0, 'C');
        
        // logo : 80 de largeur et 55 de hauteur
        //$pdf->Image('logo_societe.png', 10, 10, 80, 55);

        //************************
        //Infos de la facture
        //***********************
        
        $pdf->SetXY( 5, 60 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 80, 8, "Recu numero ", 0, 0, 'L');
        $pdf->SetXY( 35, 60 ); $pdf->SetFont('Arial','B',12); $pdf->Cell( 20, 8, $commande->getId(), 0, 0, 'L');
        $pdf->SetXY( 42, 60 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 50, 8, "du", 0, 0, 'L');
        $pdf->SetXY( 50, 60 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 50, 8, date_format($commande->getDate(),"Y/m/d H:i:s"), 0, 0, 'L');
        
        $pdf->SetXY( 5, 72 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 100, 8, "Nom (s) du patient: ", 0, 0, 'L');
        $pdf->SetXY( 170, 72 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 50, 8, "Sexe: ", 0, 0, 'L');
        $pdf->SetXY( 5, 81 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 100, 8, "Contact(s): ", 0, 0, 'L');
        
        
        
        
        if( null !== $commande->getPatient() ){
            
            $pdf->SetXY( 44, 72 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getName(), 0, 0, 'L');
            $pdf->SetXY( 183, 72 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getSex(), 0, 0, 'L');
            $pdf->SetXY( 20, 81 ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getTelephone(), 0, 0, 'L');
            
        }
        
        $pdf->Rect(5, 70, 200, 20, "D");
        
        
        // ***********************
        // le cadre des articles
        // ***********************
        // cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
        $pdf->SetLineWidth(0.1); 
        $pdf->Rect(5, 95, 20, 50, "D");
        // cadre titre des colonnes
        $pdf->Line(5, 105, 205, 105);
        // les traits verticaux colonnes
        $pdf->Line(145, 95, 145, 213); $pdf->Line(158, 95, 158, 213); $pdf->Line(176, 95, 176, 213); 
        // titre colonne
        $pdf->SetXY( 1, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 140, 8, "Libelle", 0, 0, 'C');
        $pdf->SetXY( 145, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 13, 8, "Qte", 0, 0, 'C');
        $pdf->SetXY( 156, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 22, 8, "PU TTC", 0, 0, 'C');
        $pdf->SetXY( 178, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 22, 8, "Montant TTC", 0, 0, 'C');
        
        // les articles
        $pdf->SetFont('Arial','',11);
        $y = 97;

        if( null !== $commande->getMedoc1()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc1()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc1()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc1()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc1()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc2()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc2()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc2()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc2()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc2()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc3()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc3()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc3()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc3()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc3()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc4()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc4()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc4()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc4()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc4()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc5()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc5()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc5()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc5()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc5()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc6()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc6()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc6()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc6()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc6()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc7()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc7()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc7()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc7()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc7()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc8()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc8()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc8()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc8()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc8()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc9()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc9()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc9()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc9()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc9()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc10()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc10()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc10()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc10()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc10()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc11()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc11()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc11()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc11()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc11()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc12()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc12()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc12()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc12()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc12()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc13()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc13()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc13()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc13()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc13()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc14()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc14()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc14()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc14()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc14()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
        if( null !== $commande->getMedoc15()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc15()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc15()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc15()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc15()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            $y += 7;
        }
        
  
        // le detail des totaux, demarre a 221 après le cadre des totaux
        $pdf->SetLineWidth(0.1); $pdf->Rect(5, 221, 200, 10, "D");
        // les traits verticaux
        $pdf->Line(75, 221, 75, 231);
        // les titres
        $pdf->SetFont('Arial','B',12); 
        $pdf->SetXY( 30, 223 ); $pdf->Cell( 24, 6, "Total TTC de la facture", 0, 0, 'C');
        $nombre_format_francais = number_format($commande->getAmount(), 0, ',', ' ');
        $pdf->SetFont('Arial','B',14); $pdf->SetXY( 105, 223 ); $pdf->Cell( 24, 6, $nombre_format_francais, 0, 0, 'C');
        $pdf->SetXY( 140, 223 ); $pdf->Cell( 24, 6, "Francs CFA", 0, 0, 'C');
        $pdf->SetFont('Arial','',8);
        
        $pdf->SetXY( 5, 235 ); $pdf->SetFont('Arial','',10);
        $pdf->Cell( $pdf->GetPageWidth(), 7, "La caissiere", 0, 0, 'L');
        
        $pdf->SetXY( 135, 235 ); $pdf->SetFont('Arial','',10);
        $pdf->Cell( $pdf->GetPageWidth(), 7, "Destination", 0, 0, 'L');

        
        
        // **************************
        // pied de page
        // **************************
        $pdf->SetLineWidth(0.1); $pdf->Rect(5, 265, 200, 6, "D");
        $pdf->SetXY( 7, 265 ); $pdf->SetFont('Arial','',7);
        $pdf->Cell( $pdf->GetPageWidth(), 7, "HOPITAL DE DISTRICT DE MANJO. Les marchandises vendues ne sont ni retournees, ni reprisees.", 0, 0, 'L');
        
        $date = new \Datetime();
        $pdf->SetXY( 120, 265 ); $pdf->SetFont('Arial','',7); $pdf->Cell( $pdf->GetPageWidth(), 7, "Date impressiom: ", 0, 0, 'L');
        $pdf->SetXY( 145, 265 ); $pdf->SetFont('Arial','',7); $pdf->Cell( $pdf->GetPageWidth(), 7, date_format($date,"d/m/Y H:i:s"), 0, 0, 'L');
        
        return new Response($pdf->Output(), 200, array(
            'Content-Type' => 'application/pdf'
        ));

    }

    public function ticketcommandeAction($id, Request $request){
        
        $commande = $this->getDoctrine()->getManager()->getRepository('PMMCoreBundle:Commande')->find($id);
        
        $pdf = new \FPDF();
        $pdf->AddPage();
        
        
        //************************
        //ENTETE
        //***********************
        /*$pdf->SetXY( 15, 10 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "MINISTERE DE LA SANTE PUBLIQUE", 0, 0, 'C');
        $pdf->SetXY( 15, 15 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "DELEGATION REGIONALE DU LITTORAL", 0, 0, 'C');
        $pdf->SetXY( 15, 20 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "DISTRICT DE SANTE DE MANJO", 0, 0, 'C');
        $pdf->SetXY( 15, 25 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 50, 8, "HOPITAL DE DISTRICT DE MANJO", 0, 0, 'C');
        $pdf->SetXY( 15, 30 ); $pdf->SetFont('Arial','',8); $pdf->Cell( 50, 8, "B.P: 05 Manjo  Tel: 243 25 98 00", 0, 0, 'C');
        $pdf->SetXY( 15, 33 ); $pdf->SetFont('Arial','',8); $pdf->Cell( 50, 8, "E-mail: hdmanjo@gmail.com", 0, 0, 'C');
        
        $pdf->SetXY( 145, 10 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "REPUBLIQUE DU CAMEROUN", 0, 0, 'C');
        $pdf->SetXY( 145, 15 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 50, 8, "PAIX - TRAVAIL - PATRIE", 0, 0, 'C');*/
        
        // logo : 80 de largeur et 55 de hauteur
        //$pdf->Image('logo_societe.png', 10, 10, 80, 55);

        //************************
        //Infos de la facture
        //***********************
        
        $y = 27;
        $yd = 20;
        $yf = 0;
        
        $pdf->SetXY( 5, 10+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 80, 8, "Recu numero ", 0, 0, 'L');
        $pdf->SetXY( 32, 10+$yd ); $pdf->SetFont('Arial','B',12); $pdf->Cell( 20, 8, $commande->getId(), 0, 0, 'L');
        $pdf->SetXY( 38, 10+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 50, 8, "du", 0, 0, 'L');
        $pdf->SetXY( 45, 10+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 50, 8, date_format($commande->getDate(),"Y/m/d H:i:s"), 0, 0, 'L');
        
        $pdf->SetXY( 5, 15+$yd ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 100, 8, "Nom patient: ", 0, 0, 'L');
        $pdf->SetXY( 160, 15+$yd ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 50, 8, "Sexe: ", 0, 0, 'L');
        $pdf->SetXY( 5, 20+$yd ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 100, 8, "Contact: ", 0, 0, 'L');
        
        
        
        
        if( null !== $commande->getPatient() ){
            
            $pdf->SetXY( 27, 15+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getName(), 0, 0, 'L');
            $pdf->SetXY( 170, 15+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getSex(), 0, 0, 'L');
            $pdf->SetXY( 25, 15+$yd ); $pdf->SetFont('Arial','',12); $pdf->Cell( 140, 8, $commande->getPatient()->getTelephone(), 0, 0, 'L');
            
        }
        
        //$pdf->Rect(5, 70, 200, 20, "D");
        
        
        // ***********************
        // le cadre des articles
        // ***********************
        // cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
        
        //$pdf->Line(5, 27+$yd, 5, 27+$yd);
        // cadre titre des colonnes
        //$pdf->Line(5, 105, 205, 105);
        // les traits verticaux colonnes
        //$pdf->Line(145, 95, 145, 213); $pdf->Line(158, 95, 158, 213); $pdf->Line(176, 95, 176, 213); 
        // titre colonne
        $pdf->SetXY( 10, 27+$yd ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 140, 8, "Libelle", 0, 0, '');
        $pdf->SetXY( 145, 27+$yd ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 13, 8, "Qte", 0, 0, 'R');
        $pdf->SetXY( 156, 27+$yd ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 22, 8, "PU TTC", 0, 0, 'R');
        $pdf->SetXY( 178, 27+$yd ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 22, 8, "Montant TTC", 0, 0, 'R');
        $pdf->Line(5, 35+$yd, 205, 35+$yd);
        
        
        // les articles
        $pdf->SetFont('Arial','',11);
        

        if( null !== $commande->getMedoc1()->getQuantity()  ){
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc1()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc1()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc1()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc1()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc2()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc2()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc2()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc2()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc2()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
           
        }
        
        if( null !== $commande->getMedoc3()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc3()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc3()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc3()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc3()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc4()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc4()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc4()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc4()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc4()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc5()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc5()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc5()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc5()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc5()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc6()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc6()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc6()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc6()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc6()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc7()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc7()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc7()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc7()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc7()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc8()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc8()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc8()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc8()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc8()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc9()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc9()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc9()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc9()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc9()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc10()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc10()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc10()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc10()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc10()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc11()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc11()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc11()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc11()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc11()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc12()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc12()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc12()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc12()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc12()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc13()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc13()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc13()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc13()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc13()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc14()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc14()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc14()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc14()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc14()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
           //$pdf->Line(5, $y+15, 205, $y+15);
            
            
        }
        
        if( null !== $commande->getMedoc15()->getQuantity()  ){
            
            $y += 6;
            // libelle
            $pdf->SetXY( 7, $y+9+$yd ); $pdf->Cell( 140, 5, $commande->getMedoc15()->getMedicament()->getName(), 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9+$yd ); $pdf->Cell( 13, 5, $commande->getMedoc15()->getQuantity(), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($commande->getMedoc15()->getMedicament()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 158, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($commande->getMedoc15()->getPrice(), 0, ',', ' ');
            $pdf->SetXY( 187, $y+9+$yd ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            //$pdf->Line(5, $y+15, 205, $y+15);
            
            //
        }
        
  
        $pdf->SetLineWidth(0.1); 
        $pdf->Rect(5, 27+$yd, 200, $y-31+$yd, "D");
        
        // le detail des totaux, demarre a 221 après le cadre des totaux
        //$pdf->SetLineWidth(0.1); $pdf->Rect(5, 221, 200, 10, "D");
        // les traits verticaux
        //$pdf->Line(5, 221, 75, 231);
        // les titres
        $pdf->Line(5, $y+24+$yd, 205, $y+24+$yd);
        $pdf->SetFont('Arial','B',12); 
        $pdf->SetXY( 30, $y+18+$yd ); $pdf->Cell( 24, 6, "TOTAL", 0, 0, 'C');
        $nombre_format_francais = number_format($commande->getAmount(), 0, ',', ' ');
        $pdf->SetFont('Arial','B',14); 
        $pdf->SetXY( 105, $y+18+$yd ); $pdf->Cell( 24, 6, $nombre_format_francais, 0, 0, 'C');
        $pdf->SetXY( 140, $y+18+$yd ); $pdf->Cell( 24, 6, "Francs CFA", 0, 0, 'C');
        $pdf->SetFont('Arial','',8);
        
        $pdf->SetXY( 5, 155+$yd ); $pdf->SetFont('Arial','',10);
        //$pdf->Cell( $pdf->GetPageWidth(), 7, "La caissiere", 0, 0, 'L');
        
        /*$pdf->SetXY( 135, 175 ); $pdf->SetFont('Arial','',10);
        $pdf->Cell( $pdf->GetPageWidth(), 7, "Destination", 0, 0, 'L');*/

        
        
        // **************************
        // pied de page
        // **************************
       /* $pdf->SetLineWidth(0.1); $pdf->Rect(5, 265, 200, 6, "D");
        $pdf->SetXY( 7, 265 ); $pdf->SetFont('Arial','',7);
        $pdf->Cell( $pdf->GetPageWidth(), 7, "HOPITAL DE DISTRICT DE MANJO. Les marchandises vendues ne sont ni retournees, ni reprisees.", 0, 0, 'L');
        
        $date = new \Datetime();
        $pdf->SetXY( 120, 265 ); $pdf->SetFont('Arial','',7); $pdf->Cell( $pdf->GetPageWidth(), 7, "Date impressiom: ", 0, 0, 'L');
        $pdf->SetXY( 145, 265 ); $pdf->SetFont('Arial','',7); $pdf->Cell( $pdf->GetPageWidth(), 7, date_format($date,"d/m/Y H:i:s"), 0, 0, 'L');
        */
        return new Response($pdf->Output(), 200, array(
            'Content-Type' => 'application/pdf'
        ));

    }
    
}
