<?php 

namespace App\Controllers\Reportes;

use App\Controllers\BaseController;
use App\Models\SolicitudModel;
use TCPDF;


class ReportController extends BaseController
{
    protected $solicitudModel;

    public function __construct()
    {
        $this->solicitudModel = new SolicitudModel();
    }

    public function reportView()
    {
        
        return view('Report/Reports', ['titulo' => 'Reportes']);
    }

    public function generateReport()
    {
        $fecha_hoy = date('Y-m-d H:i:s');
        $bitacora = $this->solicitudModel->getBitacoraSolicitudes($fecha_hoy);

        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Nombre');
        $pdf->SetTitle('Bitácora de Solicitudes');
        $pdf->SetHeaderData('', 0, 'Bitácora de Solicitudes', '');
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->AddPage();

        // Contenido del reporte
        $html = '<h1>Bitácora</h1>';
        $html .= '<p>Fecha: ' . date('Y-m-d H:i:s') . ' Emisor: ' . session()->get('nombre_u') . ' ' . session()->get('apellido_u') . '</p>';
        $html .= '<h2>Solicitudes Atendidas</h2>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr><th>Departamento</th><th>Tipo de Solicitud</th></tr>';

        foreach ($bitacora as $solicitud) {
            if($solicitud['estado'] == 'RESUELTO')
            {
                $style = ' background-color: #d4edda;'; // Color verde para solicitudes resueltas
                $html .= '<tr style="' . $style . '">';
                $html .= '<td>' . htmlspecialchars((string) ($solicitud['departamento'] ?? ''), ENT_QUOTES, 'UTF-8') . '</td>';
                $html .= '<td>' . htmlspecialchars((string) ($solicitud['tipo_solicitud'] ?? ''), ENT_QUOTES, 'UTF-8') . '</td>';
                $html .= '</tr>';
            }
        }

        $html .= '</table>';

        $html .= '<h2>Solicitudes Pendientes</h2>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr><th>Departamento</th><th>Tipo de Solicitud</th></tr>';
        foreach ($bitacora as $solicitud) {
            if($solicitud['estado'] == 'PENDIENTE')
            {
                $html .= '<tr style="background-color: #f8f9fa;">';
                $html .= '<td>' . htmlspecialchars((string) ($solicitud['departamento'] ?? ''), ENT_QUOTES, 'UTF-8') . '</td>';
                $html .= '<td>' . htmlspecialchars((string) ($solicitud['tipo_solicitud'] ?? ''), ENT_QUOTES, 'UTF-8') . '</td>';
                $html .= '</tr>';
            }
        }
        $html .= '</table>';

        $pdf->SetFont('helvetica', '', 11);

        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->Output('bitacora_solicitudes.pdf', 'I');
        exit;
    }

}

?>