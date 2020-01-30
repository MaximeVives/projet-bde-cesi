DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutActivite`(IN `P_nom` VARCHAR(50), IN `P_description` VARCHAR(50), IN `P_URL` VARCHAR(50), IN `P_date` DATE, IN `P_prix` INT, IN `P_recurrence` INT)
    NO SQL
INSERT INTO `activite` (`ID_activite`, `Nom_activite`, `Description_activite`, `URL_photo`, `Likes`, `Commentaires`, `Date_activite`, `ID_prix`, `ID_Recurrence`) VALUES (NULL, P_nom, P_Description, P_URL, "0" , "0", P_date, P_prix, P_recurrence)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutProduit`(IN `P_nom` VARCHAR(50), IN `P_description` VARCHAR(150), IN `P_Prix` INT, IN `P_categorie` VARCHAR(50), IN `P_quantite` INT)
    NO SQL
INSERT INTO `produit` (`ID_Produit`, `Nom_Produit`, `Description_Produit`, `Prix_Produit`, `Categorie_Produit`, `quantite`) VALUES (NULL, P_nom, P_Description, P_Prix, P_categorie, P_quantite )$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DelActivite`(IN `P_ID` INT)
    NO SQL
DELETE FROM activite WHERE ID_activite = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduits`()
    NO SQL
SELECT * FROM produit$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeActivite`()
    NO SQL
SELECT * FROM activite$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DelProduit`(IN `P_ID` INT)
    NO SQL
DELETE FROM produit WHERE ID_produit = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduitsASC`()
    NO SQL
SELECT nom_produit, prix_produit FROM produit ORDER BY prix_produit ASC$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduitsDESC`()
    NO SQL
SELECT nom_produit, prix_produit FROM produit ORDER BY prix_produit DESC$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCategorieProduit`(IN `P_categorie` VARCHAR(50), IN `P_ID` INT)
    NO SQL
UPDATE `produit` SET `Categorie_produit` = P_categorie WHERE `ID_Produit` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDateActivite`(IN `P_ID` INT, IN `P_date` DATE)
    NO SQL
UPDATE `activite` SET `Date_Activite` = P_date WHERE `ID_Activite` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDescActivite`(IN `P_ID` INT, IN `P_desc` VARCHAR(150))
    NO SQL
UPDATE `activite` SET `Description_activite` = P_desc WHERE `ID_Activite` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDescProduit`(IN `P_desc` VARCHAR(150), IN `P_ID` INT)
    NO SQL
UPDATE `produit` SET `Description_produit` = P_desc WHERE `ID_Produit` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateNomActivite`(IN `P_ID` INT, IN `P_nom` VARCHAR(50))
    NO SQL
UPDATE `activite` SET `Nom_activite` = P_nom WHERE `ID_Activite` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateNomProduit`(IN `P_nom` VARCHAR(50), IN `P_ID` INT)
    NO SQL
UPDATE `produit` SET `Nom_produit` = P_nom WHERE `ID_Produit` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePrixActivite`(IN `P_ID` INT, IN `P_prix` INT)
    NO SQL
UPDATE `activite` SET `ID_prix` = P_prix WHERE `ID_Activite` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePrixProduit`(IN `P_prix` INT, IN `P_ID` INT)
    NO SQL
UPDATE `produit` SET `Prix_Produit` = P_prix WHERE `ID_Produit` = P_ID$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateRecuActivite`(IN `P_ID` INT, IN `P_rec` INT)
    NO SQL
UPDATE `activite` SET `ID_recurrence` = P_rec WHERE `ID_Activite` = P_ID$$
DELIMITER ;
