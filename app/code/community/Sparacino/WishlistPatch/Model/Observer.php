<?php
class Sparacino_WishlistPatch_Model_Observer
{

	public function replaceFormKeyForWishlistAdd(Varien_Event_Observer $observer)
	{
		$formKey = Mage::getSingleton('core/session')->getFormKey();

		$session = Mage::getSingleton('customer/session');
		$beforeWishlistRequest = $session->getBeforeWishlistRequest();

		$beforeWishlistRequest['form_key'] = $formKey;
		$session->setBeforeWishlistRequest($beforeWishlistRequest);

		$newBeforeAuthUrl = Mage::getUrl('wishlist/index/add',
			array('product' => $beforeWishlistRequest['product'], 'form_key' => $formKey)
		);
		$session->setBeforeAuthUrl($newBeforeAuthUrl);
		return $this;	
	}
		
}
