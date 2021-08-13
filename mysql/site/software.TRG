TYPE=TRIGGERS
triggers='CREATE DEFINER=`admin`@`%` TRIGGER `historico_data_insere_software` AFTER INSERT ON `software` FOR EACH ROW INSERT INTO data_software (data_alteracao_software, recebe_data_software, recebe_id_software) VALUES (now(), NEW.data_aviso, NEW.id_software)' 'CREATE DEFINER=`admin`@`%` TRIGGER `historico_data_alteracao_software` BEFORE UPDATE ON `software` FOR EACH ROW INSERT INTO data_software (data_alteracao_software, recebe_data_software, recebe_id_software) VALUES (now(), NEW.data_aviso, NEW.id_software)'
sql_modes=524288 524288
definers='admin@%' 'admin@%'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
db_cl_names='utf8_general_ci' 'utf8_general_ci'
created=162768820357 162768820355
