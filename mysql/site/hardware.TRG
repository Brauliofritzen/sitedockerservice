TYPE=TRIGGERS
triggers='CREATE DEFINER=`admin`@`%` TRIGGER `historico_data_insere_hardware` AFTER INSERT ON `hardware` FOR EACH ROW INSERT INTO data_hardware (data_alteracao_hardware, recebe_data_hardware, recebe_id_hardware) VALUES (now(), NEW.data_aviso, NEW.id_hardware)' 'CREATE DEFINER=`admin`@`%` TRIGGER `historico_data_alteracao_hardware` BEFORE UPDATE ON `hardware` FOR EACH ROW INSERT INTO data_hardware (data_alteracao_hardware, recebe_data_hardware, recebe_id_hardware) VALUES (now(), NEW.data_aviso, NEW.id_hardware)'
sql_modes=524288 524288
definers='admin@%' 'admin@%'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
db_cl_names='utf8_general_ci' 'utf8_general_ci'
created=162768820337 162768820334
