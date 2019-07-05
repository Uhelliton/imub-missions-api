<?php
namespace IGestao\Domains\Auditing\Repositories\Traits;

use DB;

trait StatisticLogAccessTrait {


    /**
     * Retorna os acesso diarios + quantidade de inscritos em notificaoes push
     * acesso contado apenas via hospede
     *
     * @param array $between
     * @return array
     */
    public function filterAccessDailyWithSubscribersNotification($between = array('*'))
    {
        $between = (object) $between;

        return
            DB::select("
                    SELECT 
                         data_acesso, COUNT(*) AS total_acesso,   
                        (SELECT 
                                COUNT(DATE(created_at)) AS total_inscrito
                            FROM
                                notificacao_inscricao
                            WHERE
                                DATE(notificacao_inscricao.created_at) = DATE(log_acesso.data_acesso)
                            GROUP BY DATE(created_at)) AS total_inscrito
                    FROM
                        (SELECT 
                            COUNT(DISTINCT DATE(created_at)) AS acesso,
                                DATE(created_at) AS data_acesso,
                                hospede_reserva_id,
                                agente_usuario
                        FROM
                            log_acesso
                        WHERE
                          DATE(created_at) BETWEEN '{$between->dateInitial}' AND  '{$between->dateFinal} '
                          AND tipo_acesso_id = 1
                        GROUP BY data_acesso , hospede_reserva_id , agente_usuario) AS log_acesso
                    GROUP BY data_acesso
                ");
    }


    /**
     * Retorna os acesso diarios por tipo de paginas
     * acesso contado apenas via hospede
     *
     * @param array $between
     * @return array
     */
    public function filterAccessDailyByRoutesType($between = array('*'))
    {
        $between = (object) $between;

        return
            DB::select("
                    SELECT 
                        REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE (
                        REPLACE( REPLACE( REPLACE( REPLACE(
                        SUBSTRING_INDEX(url, '#/', -1), '0', ''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9','')  as uri,
                        DATE(created_at) AS data_acesso, COUNT(substring_index(url, '/#/', -1) ) AS total_acesso
                    FROM log_acesso
                    WHERE tipo_acesso_id = 1 
                        AND DATE(created_at) BETWEEN '{$between->dateInitial}' AND  '{$between->dateFinal} '
                    GROUP BY data_acesso, uri
                    ORDER BY data_acesso, uri
                ");
    }
}