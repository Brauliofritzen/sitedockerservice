TYPE=TRIGGERS
triggers='CREATE DEFINER=`admin`@`%` TRIGGER `atualiza_email` BEFORE UPDATE ON `usuario` FOR EACH ROW BEGIN UPDATE software SET email= NEW.email WHERE email =OLD.email;UPDATE hardware SET email= NEW.email WHERE email =OLD.email;END'
sql_modes=524288
definers='admin@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='utf8_general_ci'
created=162768820367
