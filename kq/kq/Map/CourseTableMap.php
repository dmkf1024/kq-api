<?php

namespace kq\kq\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use kq\kq\Course;
use kq\kq\CourseQuery;


/**
 * This class defines the structure of the 'course' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CourseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'kq.kq.Map.CourseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'course';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\kq\\kq\\Course';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'kq.kq.Course';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'course.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'course.name';

    /**
     * the column name for the start_week field
     */
    const COL_START_WEEK = 'course.start_week';

    /**
     * the column name for the end_week field
     */
    const COL_END_WEEK = 'course.end_week';

    /**
     * the column name for the day_in_week field
     */
    const COL_DAY_IN_WEEK = 'course.day_in_week';

    /**
     * the column name for the start_class field
     */
    const COL_START_CLASS = 'course.start_class';

    /**
     * the column name for the end_class field
     */
    const COL_END_CLASS = 'course.end_class';

    /**
     * the column name for the teacher_id field
     */
    const COL_TEACHER_ID = 'course.teacher_id';

    /**
     * the column name for the classroom field
     */
    const COL_CLASSROOM = 'course.classroom';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'StartWeek', 'EndWeek', 'DayInWeek', 'StartClass', 'EndClass', 'TeacherId', 'Classroom', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'startWeek', 'endWeek', 'dayInWeek', 'startClass', 'endClass', 'teacherId', 'classroom', ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_ID, CourseTableMap::COL_NAME, CourseTableMap::COL_START_WEEK, CourseTableMap::COL_END_WEEK, CourseTableMap::COL_DAY_IN_WEEK, CourseTableMap::COL_START_CLASS, CourseTableMap::COL_END_CLASS, CourseTableMap::COL_TEACHER_ID, CourseTableMap::COL_CLASSROOM, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'start_week', 'end_week', 'day_in_week', 'start_class', 'end_class', 'teacher_id', 'classroom', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'StartWeek' => 2, 'EndWeek' => 3, 'DayInWeek' => 4, 'StartClass' => 5, 'EndClass' => 6, 'TeacherId' => 7, 'Classroom' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'startWeek' => 2, 'endWeek' => 3, 'dayInWeek' => 4, 'startClass' => 5, 'endClass' => 6, 'teacherId' => 7, 'classroom' => 8, ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_ID => 0, CourseTableMap::COL_NAME => 1, CourseTableMap::COL_START_WEEK => 2, CourseTableMap::COL_END_WEEK => 3, CourseTableMap::COL_DAY_IN_WEEK => 4, CourseTableMap::COL_START_CLASS => 5, CourseTableMap::COL_END_CLASS => 6, CourseTableMap::COL_TEACHER_ID => 7, CourseTableMap::COL_CLASSROOM => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'start_week' => 2, 'end_week' => 3, 'day_in_week' => 4, 'start_class' => 5, 'end_class' => 6, 'teacher_id' => 7, 'classroom' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('course');
        $this->setPhpName('Course');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\kq\\kq\\Course');
        $this->setPackage('kq.kq');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 12, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 24, null);
        $this->addColumn('start_week', 'StartWeek', 'INTEGER', true, null, null);
        $this->addColumn('end_week', 'EndWeek', 'INTEGER', true, null, null);
        $this->addColumn('day_in_week', 'DayInWeek', 'INTEGER', true, null, null);
        $this->addColumn('start_class', 'StartClass', 'INTEGER', true, null, null);
        $this->addColumn('end_class', 'EndClass', 'INTEGER', true, null, null);
        $this->addColumn('teacher_id', 'TeacherId', 'VARCHAR', true, 12, null);
        $this->addColumn('classroom', 'Classroom', 'VARCHAR', true, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CourseTableMap::CLASS_DEFAULT : CourseTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Course object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CourseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CourseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CourseTableMap::OM_CLASS;
            /** @var Course $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CourseTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CourseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Course $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CourseTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CourseTableMap::COL_ID);
            $criteria->addSelectColumn(CourseTableMap::COL_NAME);
            $criteria->addSelectColumn(CourseTableMap::COL_START_WEEK);
            $criteria->addSelectColumn(CourseTableMap::COL_END_WEEK);
            $criteria->addSelectColumn(CourseTableMap::COL_DAY_IN_WEEK);
            $criteria->addSelectColumn(CourseTableMap::COL_START_CLASS);
            $criteria->addSelectColumn(CourseTableMap::COL_END_CLASS);
            $criteria->addSelectColumn(CourseTableMap::COL_TEACHER_ID);
            $criteria->addSelectColumn(CourseTableMap::COL_CLASSROOM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.start_week');
            $criteria->addSelectColumn($alias . '.end_week');
            $criteria->addSelectColumn($alias . '.day_in_week');
            $criteria->addSelectColumn($alias . '.start_class');
            $criteria->addSelectColumn($alias . '.end_class');
            $criteria->addSelectColumn($alias . '.teacher_id');
            $criteria->addSelectColumn($alias . '.classroom');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME)->getTable(CourseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CourseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CourseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Course or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Course object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \kq\kq\Course) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CourseTableMap::DATABASE_NAME);
            $criteria->add(CourseTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CourseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CourseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CourseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the course table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CourseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Course or Criteria object.
     *
     * @param mixed               $criteria Criteria or Course object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Course object
        }


        // Set the correct dbName
        $query = CourseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CourseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CourseTableMap::buildTableMap();
