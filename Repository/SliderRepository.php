<?php
/*
* This file is part of the OrbitaleCmsBundle package.
*
* (c) Alexandre Rock Ancelet <alex@orbitale.io>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Orbitale\CMS\Bundle\SlidersBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SliderRepository extends EntityRepository {

    public function findForFront($slug) {
        return $this->createQueryBuilder('slider')
            ->leftJoin('slider.slides', 'slides')
                ->addSelect('slides')
            ->andWhere('slider.slug = :slug')
                ->setParameter('slug', $slug)
            ->orderBy('slides.order', 'asc')
            ->getQuery()->getOneOrNullResult()
        ;
    }
}
