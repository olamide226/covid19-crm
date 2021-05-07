DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `get_user_group`(`idd` INT(10)) RETURNS char(250) CHARSET latin1
BEGIN
        DECLARE user_group CHAR(250);
        SELECT item_name INTO user_group from auth_assignment where user_id = idd;
        RETURN user_group;
    END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sla_reformer`()
    COMMENT 'Hourly routine to update SLAs'
BEGIN

	update ecrm_conversations a JOIN ecrm_sla s ON a.category_id = s.category_id AND a.product_id = s.product_id AND a.fraud_status = s.is_fraud AND
	a.sla_urgency = s.is_urgent AND (a.sla_level + 1) = s.level
	SET a.sla_id = s.id,
    a.sla_due_time = date_add(NOW(), INTERVAL s.duration HOUR),
    a.sla_level = s.level,
    a.cbflag = 'N'

    where a.ticket_status = 'open' AND a.sla_due_time < NOW();


    update ecrm_conversations
    	SET ticket_status = 'closed', cbflag = 'N'
    	WHERE ticket_status = 'resolved' AND DATE_ADD(updated_date, INTERVAL 24 HOUR) < NOW() ;


END$$

CREATE TRIGGER `set_initial_sla` BEFORE INSERT ON `ecrm_conversations`
 FOR EACH ROW IF (NEW.ticket_status = 'open')
THEN
SELECT sla_urgency
INTO  @urgency1  from ecrm_comment where ecrm_comment.id = NEW.comment_id;
SELECT ecrm_sla.id, ecrm_sla.duration
INTO @sla1, @duration1 FROM ecrm_sla
WHERE ecrm_sla.product_id = NEW.product_id	AND ecrm_sla.category_id = NEW.category_id AND
ecrm_sla.is_fraud = NEW.fraud_status AND ecrm_sla.level = 1 AND ecrm_sla.is_urgent = @urgency1;

SET NEW.sla_id = @sla1,
NEW.sla_due_time = DATE_ADD(NOW(), INTERVAL @duration1 HOUR),
NEW.sla_urgency = @urgency1;
END IF

CREATE TRIGGER `set_initial_sla2` BEFORE UPDATE ON `ecrm_conversations`
 FOR EACH ROW IF (NEW.ticket_status = 'open' AND OLD.sla_id IS NULL )
   THEN
      SELECT sla_urgency
      INTO  @urgency1  from ecrm_comment where ecrm_comment.id = NEW.comment_id;
      SELECT ecrm_sla.id, ecrm_sla.duration
      INTO @sla1, @duration1 FROM ecrm_sla
      WHERE ecrm_sla.product_id = NEW.product_id  AND ecrm_sla.category_id = NEW.category_id AND
      ecrm_sla.is_fraud = NEW.fraud_status AND ecrm_sla.level = 1 AND ecrm_sla.is_urgent = @urgency1;

      SET NEW.sla_id = @sla1,
      NEW.sla_due_time = DATE_ADD(NOW(), INTERVAL @duration1 HOUR),
      NEW.sla_urgency = @urgency1;
  END IF

CREATE TRIGGER `conv_history` BEFORE UPDATE ON `ecrm_conversations`
 FOR EACH ROW insert into ecrm_conversations_history (
	 `old_id`,
  `ticket_number`,
  `ticket_status`,
  `customer_name`,
  `phone_no`,
  `member_id`,
  `entry_category`,
  `association`,
  `amount_paid`,
  `date_paid`,
  `comment_id`,
  `other_comment`,
  `cc_agent_response`,
  `fraud_status`,
  `cc_agent_action`,
  `user_id`,
  `entry_source_id`,
  `call_type_id`,
  `call_source_id`,
  `category_id`,
  `agent_phone_no`,
  `agent_name`,
  `payment_medium`,
  `product_id`,
  `entry_date`,
  `created_date`,
   cbr_amt_repaid,
   cbr_amt_due,
   cbr_amt_default,
	sla_id,
	sla_due_time,
	sla_urgency,
    sla_level,
	cbflag,
	state_id)

select
	 `id`,
  `ticket_number`,
  `ticket_status`,
  `customer_name`,
  `phone_no`,
  `member_id`,
  `entry_category`,
  `association`,
  `amount_paid`,
  `date_paid`,
  `comment_id`,
  `other_comment`,
  `cc_agent_response`,
  `fraud_status`,
  `cc_agent_action`,
  `user_id`,
  `entry_source_id`,
  `call_type_id`,
  `call_source_id`,
  `category_id`,
  `agent_phone_no`,
  `agent_name`,
  `payment_medium`,
  `product_id`,
  `entry_date`,
  `created_date`,
  cbr_amt_repaid,
   cbr_amt_due,
   cbr_amt_default,
	sla_id,
	sla_due_time,
	sla_urgency,
    sla_level,
	NEW.cbflag,
    state_id

  FROM ecrm_conversations e
  WHERE e.id = new.id

DELIMITER ;
